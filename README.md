# Installation
`composer require yepwoo/laravel-parser`

# Usage
Allow your application to load any model relation in the response without the need of changing your API controllers.
Pass a comma separated relations to your http request.

# Loading relations
Add `with` param to your HTTP request

`/users?with=orders,posts,anyOtherRelation`

# laravel-parser
