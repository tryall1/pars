<?php

class model_Blog extends Model
{
	const TABLE_NAME = 'blog';

	public $id = 0;
	public $dat = '';
	public $title = '';
	public $body = '';
	public $lead = '';

	public function getUrl()
	{
		return '/blog/read/' . $this->id;
	}

	public function getById()
	{
		if ($this->id < 1)
			return false;
		$sth = Db::getInst()->prepare('SELECT * FROM ' . self::TABLE_NAME . ' WHERE id = :id');
		$sth->setFetchMode(PDO::FETCH_CLASS, 'model_Blog');
		$sth->bindParam(':id', $this->id, PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetch(PDO::FETCH_CLASS);
	}

	public function savePost()
	{
		try {
			if ($this->id > 0)
				$sql = 'UPDATE ' . self::TABLE_NAME . ' SET title = :title, body = :body, lead = :lead WHERE id = :id';
			else
				$sql = 'INSERT INTO ' . self::TABLE_NAME . ' (dat, title, body, lead) VALUES (:dat, :title, :body, :lead)';

			$sth = Db::getInst()->prepare($sql);

			$sth->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
			$sth->bindParam(':body', $_POST['body'], PDO::PARAM_STR);
			$sth->bindParam(':lead', $_POST['lead'], PDO::PARAM_STR);

			if ($this->id > 0)
				$sth->bindParam(':id', $this->id, PDO::PARAM_INT);
			else
				$sth->bindParam(':dat', date('Y-m-d H:i:s'), PDO::PARAM_STR);

			$sth->execute();

			if ($this->id == 0)
				$this->id = Db::getInst()->lastInsertId();

			return true;
		} catch (PDOException $e) {
			return 'Database access FAILED!';
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	static public function getCount()
	{
		$sth = Db::getInst()->query('SELECT COUNT(*) FROM ' . self::TABLE_NAME);
		return $sth->fetch(PDO::FETCH_COLUMN);
	}

	static public function getList($page = 0, $max = 3)
	{
		$sth = Db::getInst()->prepare('SELECT * FROM ' . self::TABLE_NAME . ' ORDER BY id DESC LIMIT :skip, :max');
		$sth->setFetchMode(PDO::FETCH_CLASS, 'model_Blog');
		$skip = $page > 1 ? --$page * $max : 0;
		$sth->bindParam(':skip', $skip, PDO::PARAM_INT);
		$sth->bindParam(':max', $max, PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetchAll(PDO::FETCH_CLASS, 'model_Blog');
	}

}
