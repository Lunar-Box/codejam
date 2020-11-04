import funcs as func

from flask import Flask
from flask_restful import Api, Resource
app = Flask(__name__)
api = Api(app)

import docker
try:
    client = docker.from_env()
except:
    exit()

def create():
    output = client.containers.run("quay.io/infoupgraders/images:final", detach=True, stdin_open=True)
    return output


class create(Resource):
    def post(self, lang):
        print(lang)
        ret = func.create(lang)
        return {"data": {'uuid': ret['uuid'], 'uuid_short': ret['uuid_short'], 'startup': ret['startup']}}
api.add_resource(create, "/create/<string:lang>")

class start(Resource):
    def post(self, uuid, startup):
        ret = func.start(uuid, startup)
        return {"data": ret}
api.add_resource(start, "/start/<string:uuid>/<string:startup>")

class restart(Resource):
    def post(self, uuid):
        ret = func.restart(uuid)
        return {"data": ret}
api.add_resource(restart, "/restart/<string:uuid>")

class stop(Resource):
    def post(self, uuid):
        ret = func.stop(uuid)
        return {"data": ret}
api.add_resource(stop, "/stop/<string:uuid>")

class kill(Resource):
    def post(self, uuid):
        ret = func.kill(uuid)
        return {"data": ret}
api.add_resource(kill, "/kill/<string:uuid>")


if __name__ == "__main__":
    app.run(debug=True, host="127.0.0.1", port=5000)