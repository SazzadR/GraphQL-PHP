<?php

namespace Blog;

use Blog\Schema\LatestPostField;

use Youshido\GraphQL\Schema\Schema;
use Youshido\GraphQL\Execution\Processor;
use Youshido\GraphQL\Type\Object\ObjectType;

require_once __DIR__ . '/vendor/autoload.php';

$rootQueryType = new ObjectType([
    'name' => 'RootQueryType',
    'fields' => [
        new LatestPostField()
    ]
]);

$processor = new Processor(new Schema([
    'query' => $rootQueryType
]));

$payload = '{ latestPost {title, summary } }';
$processor->processPayload($payload);
echo json_encode($processor->getResponseData(), true);
