# retrieve user information
require 'net/http'
require 'json'

API_VERSION = 1
API_HOST    = 'https://api.thebase.in'
CODE        = '' # Your CODE
token       = '' # Retrieve token using ruby/oauth/token.rb

header_parameters =
  { 'Authorization' => "Bearer #{token}" }

uri =
  URI.join(
    API_HOST,
    "#{API_VERSION}/users/me")

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
