import json

data = json.load(open('songIdDtb.json'))
print(len(data))
uniqueArray = set(data)
uniqueArray = list(uniqueArray)
print(len(uniqueArray))
print(uniqueArray)
with open('songIdDtb.json', 'w') as outfile:
    json.dump(uniqueArray, outfile)