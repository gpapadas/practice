import requests

#Get CSRF token
token = str(requests.get('http://practice.docksal/session/token').text)

endpoint = 'http://practice.docksal/node/4?_format=hal_json'

#Set all required headers
headers = {
  'Content-Type':'application/hal+json',
  'X-CSRF-Token':token
}

body =  '''{
  "_links": {
    "type": {
      "href": "http://practice.docksal/rest/type/node/dream_it"
    }
  },
  "field_place":[{"value":"France"}]
}'''

#Update existing DreamIt node.
r = requests.patch(endpoint, data=body, headers=headers, auth=('rest','rest'))

if r.status_code == 200:
    print ("Success")
else:
    print ("Fail")
    print (r.status_code)