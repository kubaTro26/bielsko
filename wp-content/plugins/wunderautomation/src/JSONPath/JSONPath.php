<?php
namespace WunderAuto\JSONPath;

/**
 * MIT License
 * Copyright (c) 2018 Flow Communications
 * https://github.com/FlowCommunications/JSONPath
 *
 * JSONPath library is copyright of Flow Communications used
 * under MIT License. Moved in under WunderAutomation namespace
 * to avoid name and version conflicts with other WordPress plugins
 * MIT License
 *
 * Copyright (c) 2018 Flow Communications
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

use ArrayAccess;
use Countable;
use Iterator;
use JsonSerializable;
use WunderAuto\JSONPath\Filters\AbstractFilter;

/**
 * Class JSONPath
 * @package WunderAuto\JSONPath
 */
class JSONPath implements ArrayAccess, Iterator, JsonSerializable, Countable
{
    protected static $tokenCache = [];

    protected $data;

    protected $options;

    const ALLOW_MAGIC = 1;

    /**
     * @param $data
     * @param int $options
     */
    public function __construct($data, $options = 0)
    {
        $this->data = $data;
        $this->options = $options;
    }

    /**
     * Evaluate an expression
     *
     * @param $expression
     * @return static
     * @throws JSONPathException
     */
    public function find($expression)
    {
        $tokens = $this->parseTokens($expression);

        $collectionData = [$this->data];

        foreach ($tokens as $token) {
            $filter = $token->buildFilter($this->options);

            $filteredData = [];

            foreach ($collectionData as $value) {
                if (AccessHelper::isCollectionType($value)) {
                    $filteredValue = $filter->filter($value);
                    $filteredData = array_merge($filteredData, $filteredValue);
                }
            }

            $collectionData = $filteredData;
        }


        return new static($collectionData, $this->options);
    }

    /**
     * @return mixed
     */
    public function first()
    {
        $keys = AccessHelper::collectionKeys($this->data);

        if (empty($keys)) {
            return null;
        }

        $value = isset($this->data[$keys[0]]) ? $this->data[$keys[0]] : null;

        return AccessHelper::isCollectionType($value) ? new static($value, $this->options) : $value;
    }

    /**
     * Evaluate an expression and return the last result
     * @return mixed
     */
    public function last()
    {
        $keys = AccessHelper::collectionKeys($this->data);

        if (empty($keys)) {
            return null;
        }

        $value = $this->data[end($keys)] ? $this->data[end($keys)] : null;

        return AccessHelper::isCollectionType($value) ? new static($value, $this->options) : $value;
    }

    /**
     * Evaluate an expression and return the first key
     * @return mixed
     */
    public function firstKey()
    {
        $keys = AccessHelper::collectionKeys($this->data);

        if (empty($keys)) {
            return null;
        }

        return $keys[0];
    }

    /**
     * Evaluate an expression and return the last key
     * @return mixed
     */
    public function lastKey()
    {
        $keys = AccessHelper::collectionKeys($this->data);

        if (empty($keys) || end($keys) === false) {
            return null;
        }

        return end($keys);
    }

    /**
     * @param $expression
     * @return array
     * @throws \Exception
     */
    public function parseTokens($expression)
    {
        $cacheKey = md5($expression);

        if (isset(static::$tokenCache[$cacheKey])) {
            return static::$tokenCache[$cacheKey];
        }

        $lexer = new JSONPathLexer($expression);

        $tokens = $lexer->parseExpression();

        static::$tokenCache[$cacheKey] = $tokens;

        return $tokens;
    }

    /**
     * @return mixed
     */
    public function data()
    {
        return $this->data;
    }

    public function offsetExists($offset)
    {
        return AccessHelper::keyExists($this->data, $offset);
    }

    public function offsetGet($offset)
    {
        $value = AccessHelper::getValue($this->data, $offset);

        return AccessHelper::isCollectionType($value)
            ? new static($value, $this->options)
            : $value;
    }

    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->data[] = $value;
        } else {
            AccessHelper::setValue($this->data, $offset, $value);
        }
    }

    public function offsetUnset($offset)
    {
        AccessHelper::unsetValue($this->data, $offset);
    }

    public function jsonSerialize()
    {
        return $this->data;
    }

    /**
     * Return the current element
     */
    public function current()
    {
        $value = current($this->data);

        return AccessHelper::isCollectionType($value) ? new static($value, $this->options) : $value;
    }

    /**
     * Move forward to next element
     */
    public function next()
    {
        next($this->data);
    }

    /**
     * Return the key of the current element
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * Checks if current position is valid
     */
    public function valid()
    {
        return key($this->data) !== null;
    }

    /**
     * Rewind the Iterator to the first element
     */
    public function rewind()
    {
        reset($this->data);
    }

    /**
     * @param $key
     * @return JSONPath|mixed|null|static
     */
    public function __get($key)
    {
        return $this->offsetExists($key) ? $this->offsetGet($key) : null;
    }

    /**
     * Count elements of an object
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getFirstElement($value)
    {
        if (is_object($value)) {
            $value = get_object_vars($value);
        }
        if (is_array($value)) {
            $value = reset($value);
            return $this->getFirstElement($value);
        }

        return $value;
    }
}
