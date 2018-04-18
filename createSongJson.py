import requests
import json

data = json.load(open('songIdDtb.json'))

def createToken( ):
    url = "https://graph.nhaccuatui.com/v1/commons/token"
    headers={
        "Content-Type": "application/x-www-form-urlencoded",
        "Host": "graph.nhaccuatui.com",
        "Connection": "Keep-Alive"
    }
    values ='deviceinfo={"DeviceID":"dd03852ada21ec149103d02f76eb0a04","DeviceName":"HellCatVN:S7:NMF26X","OsName":"ANDROID","OsVersion":"8.0","AppName":"NCTTablet","UserName":"hellcatvn","QualityPlay":"128","QualityDownload":"128","QualityCloud":"128","Network":"WIFI","Provider":"NCTCorp"}&md5=ebd547335f855f3e4f7136f92ccc6955&timestamp=1499177482892'
    req = requests.post(url, data=values, headers=headers)
    data =json.loads(req.text)
    token = data['data']['accessToken']
    return token

token = createToken()

def songJson(id,token):
    linklist = 'https://graph.nhaccuatui.com/v1/songs/'+id+'?access_token='+token
    req = requests.get(linklist)
    data = json.loads(req.text)
    return data['data']
jsonDtb =[]

for val in data:
    res = songJson(val,token)
    jsonDtb.append(res)
with open('jsonDtb.json', 'w') as outfile:
    json.dump(jsonDtb, outfile)