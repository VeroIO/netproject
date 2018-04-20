import re
import requests
import urllib.request
import json


response = urllib.request.urlopen('https://www.nhaccuatui.com/playlist/top-100-pop-usuk-hay-nhat-va.zE23R7bc8e9X.html')

pagecontent=response.read().decode('utf-8')
#get All link
pattern = '<a.*?href\s*=\s*["\']([^"\'>]+)["\'][^>]*>.*?<\/a>'
a = '<a title="Người Âm Phủ - Osad" href="https://www.nhaccuatui.com/bai-hat/nguoi-am-phu-osad.l6FPmkS3Yf8f.html" ></a><a title="Cô Gái m52 - Huy, Tùng Viu" href="https://www.nhaccuatui.com/bai-hat/co-gai-m52-huy-ft-tung-viu.mChkrxMm3WHA.html">Cô Gái m52</a>'
result = re.findall(pattern, pagecontent)
#Get Nhaccuatui link bai hat only
nhaccuatuilink = []
for val in result:
    pattern2 = '.*nhaccuatui.com\/bai-hat.*'
    nctlink = re.findall(pattern2, val)
    if len(nctlink):
        nhaccuatuilink.append(nctlink[0])

def getID(link):
    link = link.replace("https://www.nhaccuatui.com/bai-hat/", "")
    res=link.split('.')
    if len(res) == 3:
        return res[1]
    else:
        return

songIdDtb= json.load(open('songIdDtb.json'))
 
for link in nhaccuatuilink:
    songId = getID(link)
    if songId != None:
        songIdDtb.append(songId)
# Remove 1 value of array because it is playlist

del songIdDtb[0]
with open('songIdDtb.json', 'w') as outfile:
    json.dump(songIdDtb, outfile)