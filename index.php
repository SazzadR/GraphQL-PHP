<?php

namespace Blog;

use Blog\Schema\LatestPostField;

use Youshido\GraphQL\Schema\Schema;
use Youshido\GraphQL\Execution\Processor;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\ObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

require_once __DIR__ . '/vendor/autoload.php';

$rootQueryType = new ObjectType([
    'name' => 'RootQueryType',
    'fields' => [
        new LatestPostField()
    ]
]);

$rootMutationType = new ObjectType([
    'name' => 'RootMutationType',
    'fields' => [
        'likePost' => [
            'type' => new IntType(),
            'args' => [
                'id' => new NonNullType(new IntType())
            ],
            'resolve' => function () {
                return 2;
            }
        ]
    ]
]);

$processor = new Processor(new Schema([
    'query' => $rootQueryType,
    'mutation' => $rootMutationType
]));

/*$payload = '{ latestPost {title, summary } }';
$processor->processPayload($payload);
echo json_encode($processor->getResponseData(), true);*/

$payload = 'mutation { likePost(id: 5) }';
$processor->processPayload($payload);
echo json_encode($processor->getResponseData(), true);
