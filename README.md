[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
# Installation
`composer require yepwoo/laravel-parser`

# Usage
Allow your application to load any model **relation** & **attributes** in the response without the need of changing your API controllers.
Pass a comma separated relations/attributes to your http request.

# Loading relations
Add `with` param to your HTTP request

`/posts?with=comments,tags,anyOtherRelation`

# Loading Attributes
Add `append` param to your HTTP request

`/posts?append=my_custom_attribute`

# How to use
- Go to your controller and call `use Yepwoo\LaravelParser\LoadParser`
- Create new object from `LoadParser` class and pass `request` and `data` -> `new LoadParser($request, $data)`
- If you want to load `relations` use `loadRelation` function.
- If you want to load `attributes` use `loadAttributes` function.

## Here's a full example
```
<?php
namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Yepwoo\LaravelParser\LoadParser;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $posts = Post::query()
        // .. your query logic here
        ->get();
        
        // new instance
        $parser = new LoadParser($request, $posts);

        // load relations
        $parser->loadRelations();
        
        // load attributes
        $parser->loadAttributes();

        return PostResource::collection($posts);
    }
}
```

### Response Example

```angular2html
[
    {
        "id": 1,
        "title": "Aperiam.",
        "comments": [
            {
                "id": 6,
                "body": "Consequuntur dolores voluptates qui minima. Enim modi quam perferendis iste eum.",
                "post_id": 1,
                "created_at": "2022-06-02T15:03:36.000000Z",
                "updated_at": "2022-06-02T15:03:36.000000Z"
            },
            {
                "id": 8,
                "body": "Eaque quaerat nobis voluptatum fugiat a quisquam. Qui consequuntur officia eum ut blanditiis.",
                "post_id": 1,
                "created_at": "2022-06-02T15:03:36.000000Z",
                "updated_at": "2022-06-02T15:03:36.000000Z"
            }
        ],
        "custom_attr": "post_1"
    },
    {
        "id": 2,
        "title": "Incidunt.",
        "comments": [
            {
                "id": 5,
                "body": "Sequi beatae atque placeat excepturi distinctio. Illum et eum quisquam natus quaerat qui eos.",
                "post_id": 2,
                "created_at": "2022-06-02T15:03:36.000000Z",
                "updated_at": "2022-06-02T15:03:36.000000Z"
            },
            {
                "id": 7,
                "body": "Corrupti eveniet enim et. Qui veritatis consectetur voluptas. Natus esse et rem aut.",
                "post_id": 2,
                "created_at": "2022-06-02T15:03:36.000000Z",
                "updated_at": "2022-06-02T15:03:36.000000Z"
            },
            {
                "id": 12,
                "body": "Perferendis fugit harum magnam et fugiat id beatae. Sit sed ipsam omnis magnam vel aut.",
                "post_id": 2,
                "created_at": "2022-06-02T15:03:36.000000Z",
                "updated_at": "2022-06-02T15:03:36.000000Z"
            }
        ],
        "custom_attr": "post_2"
    }
]
```

### Resources
Will make posts & videos soon.

### TODO
Support filters