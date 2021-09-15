<?php

abstract class DatabaseQuery
{
    protected ?string $query = null;
    protected ?string $result = null;

    abstract protected function prepareQuery(string $query);
    abstract protected function sendQuery(): void;
    abstract protected function getResult(): string;

    final public function getDataFromDB(string $query): string
    {
        $this->prepareQuery($query);
        $this->sendQuery();

        return $this->getResult();
    }
}

class MySQLQuery extends DatabaseQuery
{
    protected function prepareQuery(string $query)
    {
        $this->query = $query;
    }

    protected function sendQuery(): void
    {
        $this->result = "Sended '$this->query' to MySQL";
    }

    protected function getResult(): string
    {
        return $this->result;
    }
}

class MongoDBQuery extends DatabaseQuery
{
    protected function prepareQuery(string $query)
    {
        $this->query = $query;
    }

    protected function sendQuery(): void
    {
        $this->result = "Sended '$this->query' to MongoDB";
    }

    protected function getResult(): string
    {
        return $this->result;
    }
}

$mysqlQuery = new MySQLQuery();
echo $mysqlQuery->getDataFromDB('this is my MySQL query').PHP_EOL;

$mongoDBQuery = new MongoDBQuery();
echo $mongoDBQuery->getDataFromDB('this is my MongoDB query').PHP_EOL;