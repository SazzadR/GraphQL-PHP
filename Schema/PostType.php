<?php

namespace Blog\Schema;

use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class PostType extends AbstractObjectType
{
    public function build($config)
    {
        $config
            ->addField('title', new StringType())
            ->addField('summary', new StringType());
    }

    public function getName()
    {
        return 'Post';
    }
}
