<?php

interface TagInterface {

    public function tag(string|null $attrib=null, string|array|null $func=null);

    public function createOpenTag(array $attVal);

    public function createCloseTag(array|string|null $content);

    public function setAttributes(string|array $attributes);

    public function getAttributes();

}