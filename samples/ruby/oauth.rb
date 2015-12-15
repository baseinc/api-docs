require 'net/http'
require 'json'

API_VERSION = 1
API_HOST = 'api.thebase.in'
CODE = ''
CLIENT_ID = ''
CLIENT_SECRET = ''
REDIRECT_URI = ''

# get access token from authentication code
request_parameters = {
  grant_type: '',
  client_id: CLIENT_ID,
  client_secret: CLIENT_SECRET,
  code: CODE,
  redirect_uri: REDIRECT_URI
}
uri =
  URI(
    API_HOST,
    "/#{API_VERSION}/oauth/token",
    request_parameters)

file = File.stat 'cached_response'
request = Net::HTTP::Post.new uri
request.content_type = 'multipart/form-data'
request['If-Modified-Since'] = file.mtime.rfc2822

response =
  Net::HTTP.start(
    uri.host,
    uri.port,
    use_ssl: uri.scheme == 'https'
  ) { |http| http.request request }
