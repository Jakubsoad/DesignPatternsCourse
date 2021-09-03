<?php

interface FileSystem
{
    public function getContent(): string;
}

class Folder implements FileSystem
{
    protected array $files;

    public function getContent(): string
    {
        return 'Folder content';
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        $this->files[] = $file;

        return $this;
    }
}

class File implements FileSystem
{
    public function getContent(): string
    {
        return 'Content of file';
    }
}

$file1 = new File();
$file2 = new File();
$folder = new Folder();

$folder
    ->addFile($file1)
    ->addFile($file2)
;
