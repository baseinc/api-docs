# search items
require 'net/http'
require 'json'

API_VERSION              = 1
API_HOST                 = 'https://api.thebase.in'
CLIENT_ID_FOR_SEARCH     = '' # Your client_id for search API
CLIENT_SECRET_FOR_SEARCH = '' # Your client_secret for search API

search_words    = %w(Tシャツ シルクスクリーン 白).join ' '
sort_by         = %w(order_count\ desc stock\ desc price\ asc).join ','
searched_fields = %w(shop_name title detail).join ','
offset          = 0
limit           = 10
shop_ids        = ''

request_parameters =
  { client_id:     CLIENT_ID_FOR_SEARCH,
    client_secret: CLIENT_SECRET_FOR_SEARCH,
    q:             search_words,
    sort:          sort_by,
    start:         offset,
    size:          limit,
    fields:        searched_fields,
    shop_id:       shop_ids }

uri =
  URI([
    API_HOST,
    "/#{API_VERSION}/search/?",
    URI.encode_www_form(request_parameters)]
      .join)

request =
  Net::HTTP::Get.new(uri)

response =
  Net::HTTP.start(
    uri.hostname,
    uri.port,
    use_ssl: uri.scheme == 'https') do |http|
      http.request(request)
    end

parsed_response =
  JSON.parse response.body
