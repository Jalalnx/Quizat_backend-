<?php

// app/graphql/mutations/category/CreateCategoryMutation 

namespace App\GraphQL\Mutations\Category;

use App\Models\Category;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateCategoryMutation extends Mutation
{
          //used as mutation configuration.
    protected $attributes = [
        'name' => 'createCategory',
        'description' => 'Creates a category'
    ];

    //is used to declare what type of object this query will return.
    public function type(): Type
    {
        return GraphQL::type('Category');
    }

    //arguments this mutation will accept

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
            ],
        ];
    }
//   does the bulk of the work – it does the actual mutation using eloquent.
    public function resolve($root, $args)
    {
        $category = new Category();
        $category->fill($args);
        $category->save();

        return $category;
    }
}