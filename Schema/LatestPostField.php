<?php

namespace Blog\Schema;

use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Execution\ResolveInfo;

class LatestPostField extends AbstractField
{
    public function getType()
    {
        return new PostType();
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        return [
            'title' => 'New approach in API has been revealed',
            'summary' => 'In two words - GraphQL Rocks!',
            'likesCount' => 2
        ];
    }
}
