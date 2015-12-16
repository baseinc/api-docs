# retrieve access and refresh tokens
require 'net/http'
require 'json'

API_VERSION        = 1
API_HOST           = 'https://api.thebase.in'
CODE               = '' # YOUR_CODE
CLIENT_ID          = '' # YOUR_CLIENT_ID
CLIENT_SECRET      = '' # YOUR_CLIENT_SECRET
REDIRECT_URI       = 'http://localhost.local'
AUTHORIZATION_CODE = 'authorization_code'

request_parameters =
  { grant_type:    AUTHORIZATION_CODE,
    client_id:     CLIENT_ID,
    client_secret: CLIENT_SECRET,
    code:          CODE,
    redirect_uri:  REDIRECT_URI }

uri =
  URI.join(
    API_HOST,
    "/#{API_VERSION}/oauth/token/")

response =
  Net::HTTP.post_form(uri, request_parameters)

parsed_response =
  JSON.parse response.body
