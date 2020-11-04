import docker
try:
    client = docker.from_env()
except Exception as e:
    print(f'An error occured while connecting to Docker. This issue is mostly caused by it not being started or installed. Please refer to the error below.\n\n{e}')
    exit()

import requests


def start(id):
    container = client.containers.get(id)
    container.start()
    output = container.exec_run("cat /proc/meminfo", tty=True, user="server", workdir="/home/server")
    out1 = output.output.decode('utf-8').replace("\n", "<br>")
    out2 = out1.replace("\r", "")
    return f"{out2}<br>EXITED({output.exit_code})"

def restart(id):
    container = client.containers.get(id)
    container.stop()
    return start(id)

def stop(id):
    container = client.containers.get(id)
    container.stop()
    return f"Container {container.short_id} stopped<br><br>EXITED(0)"

def kill(id):
    container = client.containers.get(id)
    container.kill()
    return f"Container {container.short_id} killed<br><br>EXITED(0)"

def create(lang):
    langs = ['nodejsv10', 'nodejsv12', 'nodejsv14', 'python3.5', 'python3.7', 'python3.8']
    if lang not in langs:
        return f"{lang} not supported."
    if "nodejs" in lang:
        startup = "node --version"
        client.images.pull(f"quay.io/infoupgraders/nodejs", tag=lang[-2:])
        container = client.containers.create(f"quay.io/infoupgraders/nodejs:{lang[-2:]}", startup)
        return {'uuid': container.id, 'uuid_short': container.short_id, 'startup': startup}
    if "python" in lang:
        startup = "python3 --version"
        client.images.pull(f"quay.io/infoupgraders/python", tag=lang[-3:])
        container = client.containers.create(f"quay.io/infoupgraders/python:{lang[-3:]}", startup)
        return {'uuid': container.id, 'uuid_short': container.short_id, 'startup': startup}