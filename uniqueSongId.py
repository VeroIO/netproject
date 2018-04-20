<<<<<<< HEAD
import json

data = json.load(open('songIdDtb.json'))
print(len(data))
uniqueArray = set(data)
uniqueArray = list(uniqueArray)
print(len(uniqueArray))
print(uniqueArray)
with open('songIdDtb.json', 'w') as outfile:
=======
import json

data = json.load(open('songIdDtb.json'))
print(len(data))
uniqueArray = set(data)
uniqueArray = list(uniqueArray)
print(len(uniqueArray))
print(uniqueArray)
with open('songIdDtb.json', 'w') as outfile:
>>>>>>> 4eb0e18c012d3fc05d9be077eb2fc0895e3c8e71
    json.dump(uniqueArray, outfile)