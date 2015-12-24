# retrieve all items
require 'net/http'
require 'json'

API_VERSION = 1
API_HOST    = 'https://api.thebase.in'
token       = '' # Retrieve token using ruby/oauth/token.rb

header_parameters =
  { 'Authorization' => "Bearer #{token}" }

request_parameters =
  { 'order'  => 'created',
    'sort'   => 'desc',
    'limit'  => '10',
    'offset' => '0' }

uri =
  URI([
    API_HOST,
    "/#{API_VERSION}/items/?",
    URI.encode_www_form(request_parameters)]
      .join)

request =
  Net::HTTP::Get.new(
    uri,
    header_parameters)

response =
  Net::HTTP.start(
    uri.hostname,
    uri.port,
    use_ssl: uri.scheme == 'https') do |http|
      http.request(request)
    end

parsed_response =
  JSON.parse response.body
