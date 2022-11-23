<?php


namespace App\GraphQL\Queries\Quest;
// app/graphql/queries/quest/QuestQuery 


use App\Models\Quest;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class QuestQuery extends Query
{

          //query configuration.
    protected $attributes = [
        'name' => 'quest',
    ];

    // declare what type of object this query will return.
    public function type(): Type
    {
        return GraphQL::type('Quest');
    }

    // declare what arguments this query will accept
    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    // bulk of the work – it returns the actual object using eloquent.
    public function resolve($root, $args)
    {
        return Quest::findOrFail($args['id']);
    }
}