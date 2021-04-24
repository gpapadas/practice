import requests

#Get CSRF token
token = str(requests.get('http://practice.docksal/session/token').text)

endpoint = 'http://practice.docksal/node?_format=hal_json'

#Set all required headers
headers = {
  'Content-Type':'application/hal+json',
  'X-CSRF-Token':token
}

#Include all fields required by the content type
body =  '''{
  "_links": {
    "type": {
      "href": "http://practice.docksal/rest/type/node/dream_it"
    }
  },
  "title":[{"value":"Another awesome Dreamit post"}],
  "body":[{"value":"This dreamit post was created also with Python POST request!"}],
  "field_place":[{"value":"USA"}]
}'''

#Post the new node (a Dream It node) to the endpoint.
r = requests.post(endpoint, data=body, headers=headers, auth=('rest','rest'))

if r.status_code == 201:
    print ("Success")
else:
    print ("Fail")
    print (r.status_code)