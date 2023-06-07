# NX1C API

The NX1C API is an optional extra that can be added into the main NX1C codebase. The
API provides easy third party access to those with a valid key that want to read and 
make posts externally. This allows for development of third part apps and may be
particularly useful for anyone creating a mobile app.

## Usage

The NX1C API is simple and easy to use and will always return data in a json format.
An example API call can be seen below.

`https://www.example.com/api/?get_post_by_id=0&get_all_data&api_key=AABB...GG`

### The Parameters

* `get_post_by_id=<post_id>`
  * Focuses on the post corresponding to the specified id. Will return `{null}` if the post does not exist or could not be accessed.
* `get_all_data`
  * Returns all the public data from the post (poster_id, title, tags, text, reply_text, reply_poster_id).
* `get_poster`
  * Returns only the poster from the post (poster_id, poster_name, poster_role). Using this in the same query as `get_all_data` will cause an error and the API will return `{error}`.
* `get_poster_id`
  * Returns only the poster_id from the post. Using this in the same query as `get_all_data` will cause an error and the API will return `{error}`.
* `get_post_content`
  * Returns only the content from the post (title, tags, text). Using this in the same query as `get_all_data` will cause an error and the API will return `{error}`.
* `get_post_replies`
  * Returns only the replies from the post (reply_text). Using this in the same query as `get_all_data` will cause an error and the API will return `{error}`.
* `get_post_replies_advanced`
  * Returns only the replies from the post (reply_poster_id, reply_text). Using this in the same query as `get_all_data` will cause an error and the API will return `{error}`.
* `get_user_by_id=<user_id>`
  * Returns all public information about that user. Returns `{null}` if the user was not found or could not be accessed.
* `get_search_data=<search_data>`
  * Returns all relevant post_ids from a search query. MUST be used in combination with one of: `search_type_text`, `search_type_tag`, `search_type_user`. Calling without will return `{error}`.
* `search_type_text`
  * Sets the search query type to post_text
* `search_type_tag`
  * Sets the search query type to post_tags
* `search_type_user`
  * Sets the search query type to user_id
* `make_post_as_user=<user_id>`
  * Makes a post from the specified users account. This will only work if the user has enabled api posts, and they have whitelisted the specified `api_key`. If the user has not enabled api posts, not whitelisted the specified `api_key`, does not exist or is not accessible the API will return `{null}`.
* `set_post_title=<title_text>`
  * Sets the post title. MUST be used in combination with `make_post_as_user`.
* `set_post_tags=<tag_text>`
  * Sets the post tags (optional). MUST be used in combination with `make_post_as_user`.
* `set_post_text=<post_text>`
  * Sets the post text. MUST be used in combination with `make_post_as_user`.
* `api_key=<api_key>`
  * Specifies your api key.

## Security

The NX1C API is secure, but it is highly recommended that you only add it to your installation
if you know what you are doing, and you have added extra security features of your own.
It is also recommended that you have some sort of DDOS prevention as due to the public nature of the
API source code it is very easy for people to just spam requests.