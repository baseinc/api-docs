# retrieve all items
require 'net/http'
require 'json'

API_VERSION = 1
API_HOST    = 'https://api.thebase.in'
CODE        = '' # YOUR_CODE
token       = '' # Retrieve token using ruby/oauth/token.rb

request_parameters =
  { 'Authorization' => "Bearer #{token}",
    'order'         => 'created',
    'sort'          => 'desc',
    'limit'         => '10',
    'offset'        => '0' }

uri =
  URI.join(
    API_HOST,
    "/#{API_VERSION}/items")

request =
  Net::HTTP::Get.new(
    uri,
    request_parameters)

response =
  Net::HTTP.start(
    uri.hostname,
    uri.port,
    use_ssl: uri.scheme == 'https') do |http|
      http.request(request)
    end

parsed_response =
  JSON.parse response.body
