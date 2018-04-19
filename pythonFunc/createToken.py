import requests
import json

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
print(token);