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
    def post(self):
        ret = func.start("946d8c9113")
        return {"data": ret}
api.add_resource(start, "/start")

class restart(Resource):
    def post(self):
        ret = func.restart("0c410cfcc9")
        return {"data": ret}
api.add_resource(restart, "/restart")

class stop(Resource):
    def post(self):
        ret = func.stop("0c410cfcc9")
        return {"data": ret}
api.add_resource(stop, "/stop")

class kill(Resource):
    def post(self):
        ret = func.kill("0c410cfcc9")
        return {"data": ret}
api.add_resource(kill, "/kill")


if __name__ == "__main__":
    app.run(debug=True, host="127.0.0.1", port=5000)