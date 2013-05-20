<?php


/**
 * Base class that represents a row from the 'pessoa' table.
 *
 *
 *
 * @package    propel.generator.semp.om
 */
abstract class BasePessoa extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PessoaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PessoaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the co_pessoa field.
     * @var        int
     */
    protected $co_pessoa;

    /**
     * The value for the no_pessoa field.
     * @var        string
     */
    protected $no_pessoa;

    /**
     * The value for the nu_cpf field.
     * @var        string
     */
    protected $nu_cpf;

    /**
     * The value for the nu_cnpj field.
     * @var        string
     */
    protected $nu_cnpj;

    /**
     * @var        Cliente one-to-one related Cliente object
     */
    protected $singleCliente;

    /**
     * @var        Colaborador one-to-one related Colaborador object
     */
    protected $singleColaborador;

    /**
     * @var        Representada one-to-one related Representada object
     */
    protected $singleRepresentada;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $clientesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $colaboradorsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $representadasScheduledForDeletion = null;

    /**
     * Get the [co_pessoa] column value.
     *
     * @return int
     */
    public function getCoPessoa()
    {
        return $this->co_pessoa;
    }

    /**
     * Get the [no_pessoa] column value.
     *
     * @return string
     */
    public function getNoPessoa()
    {
        return $this->no_pessoa;
    }

    /**
     * Get the [nu_cpf] column value.
     *
     * @return string
     */
    public function getNuCpf()
    {
        return $this->nu_cpf;
    }

    /**
     * Get the [nu_cnpj] column value.
     *
     * @return string
     */
    public function getNuCnpj()
    {
        return $this->nu_cnpj;
    }

    /**
     * Set the value of [co_pessoa] column.
     *
     * @param int $v new value
     * @return Pessoa The current object (for fluent API support)
     */
    public function setCoPessoa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_pessoa !== $v) {
            $this->co_pessoa = $v;
            $this->modifiedColumns[] = PessoaPeer::CO_PESSOA;
        }


        return $this;
    } // setCoPessoa()

    /**
     * Set the value of [no_pessoa] column.
     *
     * @param string $v new value
     * @return Pessoa The current object (for fluent API support)
     */
    public function setNoPessoa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_pessoa !== $v) {
            $this->no_pessoa = $v;
            $this->modifiedColumns[] = PessoaPeer::NO_PESSOA;
        }


        return $this;
    } // setNoPessoa()

    /**
     * Set the value of [nu_cpf] column.
     *
     * @param string $v new value
     * @return Pessoa The current object (for fluent API support)
     */
    public function setNuCpf($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nu_cpf !== $v) {
            $this->nu_cpf = $v;
            $this->modifiedColumns[] = PessoaPeer::NU_CPF;
        }


        return $this;
    } // setNuCpf()

    /**
     * Set the value of [nu_cnpj] column.
     *
     * @param string $v new value
     * @return Pessoa The current object (for fluent API support)
     */
    public function setNuCnpj($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nu_cnpj !== $v) {
            $this->nu_cnpj = $v;
            $this->modifiedColumns[] = PessoaPeer::NU_CNPJ;
        }


        return $this;
    } // setNuCnpj()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->co_pessoa = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->no_pessoa = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nu_cpf = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nu_cnpj = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = PessoaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Pessoa object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PessoaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PessoaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->singleCliente = null;

            $this->singleColaborador = null;

            $this->singleRepresentada = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PessoaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PessoaQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PessoaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                PessoaPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->clientesScheduledForDeletion !== null) {
                if (!$this->clientesScheduledForDeletion->isEmpty()) {
                    ClienteQuery::create()
                        ->filterByPrimaryKeys($this->clientesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clientesScheduledForDeletion = null;
                }
            }

            if ($this->singleCliente !== null) {
                if (!$this->singleCliente->isDeleted() && ($this->singleCliente->isNew() || $this->singleCliente->isModified())) {
                        $affectedRows += $this->singleCliente->save($con);
                }
            }

            if ($this->colaboradorsScheduledForDeletion !== null) {
                if (!$this->colaboradorsScheduledForDeletion->isEmpty()) {
                    ColaboradorQuery::create()
                        ->filterByPrimaryKeys($this->colaboradorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->colaboradorsScheduledForDeletion = null;
                }
            }

            if ($this->singleColaborador !== null) {
                if (!$this->singleColaborador->isDeleted() && ($this->singleColaborador->isNew() || $this->singleColaborador->isModified())) {
                        $affectedRows += $this->singleColaborador->save($con);
                }
            }

            if ($this->representadasScheduledForDeletion !== null) {
                if (!$this->representadasScheduledForDeletion->isEmpty()) {
                    RepresentadaQuery::create()
                        ->filterByPrimaryKeys($this->representadasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->representadasScheduledForDeletion = null;
                }
            }

            if ($this->singleRepresentada !== null) {
                if (!$this->singleRepresentada->isDeleted() && ($this->singleRepresentada->isNew() || $this->singleRepresentada->isModified())) {
                        $affectedRows += $this->singleRepresentada->save($con);
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = PessoaPeer::CO_PESSOA;
        if (null !== $this->co_pessoa) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PessoaPeer::CO_PESSOA . ')');
        }
        if (null === $this->co_pessoa) {
            try {
                $stmt = $con->query("SELECT nextval('pessoa_co_pessoa_seq')");
                $row = $stmt->fetch(PDO::FETCH_NUM);
                $this->co_pessoa = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PessoaPeer::CO_PESSOA)) {
            $modifiedColumns[':p' . $index++]  = 'co_pessoa';
        }
        if ($this->isColumnModified(PessoaPeer::NO_PESSOA)) {
            $modifiedColumns[':p' . $index++]  = 'no_pessoa';
        }
        if ($this->isColumnModified(PessoaPeer::NU_CPF)) {
            $modifiedColumns[':p' . $index++]  = 'nu_cpf';
        }
        if ($this->isColumnModified(PessoaPeer::NU_CNPJ)) {
            $modifiedColumns[':p' . $index++]  = 'nu_cnpj';
        }

        $sql = sprintf(
            'INSERT INTO pessoa (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'co_pessoa':
                        $stmt->bindValue($identifier, $this->co_pessoa, PDO::PARAM_INT);
                        break;
                    case 'no_pessoa':
                        $stmt->bindValue($identifier, $this->no_pessoa, PDO::PARAM_STR);
                        break;
                    case 'nu_cpf':
                        $stmt->bindValue($identifier, $this->nu_cpf, PDO::PARAM_STR);
                        break;
                    case 'nu_cnpj':
                        $stmt->bindValue($identifier, $this->nu_cnpj, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = PessoaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->singleCliente !== null) {
                    if (!$this->singleCliente->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleCliente->getValidationFailures());
                    }
                }

                if ($this->singleColaborador !== null) {
                    if (!$this->singleColaborador->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleColaborador->getValidationFailures());
                    }
                }

                if ($this->singleRepresentada !== null) {
                    if (!$this->singleRepresentada->validate($columns)) {
                        $failureMap = array_merge($failureMap, $this->singleRepresentada->getValidationFailures());
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = PessoaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getCoPessoa();
                break;
            case 1:
                return $this->getNoPessoa();
                break;
            case 2:
                return $this->getNuCpf();
                break;
            case 3:
                return $this->getNuCnpj();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Pessoa'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pessoa'][$this->getPrimaryKey()] = true;
        $keys = PessoaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCoPessoa(),
            $keys[1] => $this->getNoPessoa(),
            $keys[2] => $this->getNuCpf(),
            $keys[3] => $this->getNuCnpj(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->singleCliente) {
                $result['Cliente'] = $this->singleCliente->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleColaborador) {
                $result['Colaborador'] = $this->singleColaborador->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->singleRepresentada) {
                $result['Representada'] = $this->singleRepresentada->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = PessoaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCoPessoa($value);
                break;
            case 1:
                $this->setNoPessoa($value);
                break;
            case 2:
                $this->setNuCpf($value);
                break;
            case 3:
                $this->setNuCnpj($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = PessoaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setCoPessoa($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNoPessoa($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNuCpf($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNuCnpj($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PessoaPeer::DATABASE_NAME);

        if ($this->isColumnModified(PessoaPeer::CO_PESSOA)) $criteria->add(PessoaPeer::CO_PESSOA, $this->co_pessoa);
        if ($this->isColumnModified(PessoaPeer::NO_PESSOA)) $criteria->add(PessoaPeer::NO_PESSOA, $this->no_pessoa);
        if ($this->isColumnModified(PessoaPeer::NU_CPF)) $criteria->add(PessoaPeer::NU_CPF, $this->nu_cpf);
        if ($this->isColumnModified(PessoaPeer::NU_CNPJ)) $criteria->add(PessoaPeer::NU_CNPJ, $this->nu_cnpj);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(PessoaPeer::DATABASE_NAME);
        $criteria->add(PessoaPeer::CO_PESSOA, $this->co_pessoa);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getCoPessoa();
    }

    /**
     * Generic method to set the primary key (co_pessoa column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCoPessoa($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getCoPessoa();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Pessoa (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNoPessoa($this->getNoPessoa());
        $copyObj->setNuCpf($this->getNuCpf());
        $copyObj->setNuCnpj($this->getNuCnpj());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            $relObj = $this->getCliente();
            if ($relObj) {
                $copyObj->setCliente($relObj->copy($deepCopy));
            }

            $relObj = $this->getColaborador();
            if ($relObj) {
                $copyObj->setColaborador($relObj->copy($deepCopy));
            }

            $relObj = $this->getRepresentada();
            if ($relObj) {
                $copyObj->setRepresentada($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCoPessoa(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Pessoa Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return PessoaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PessoaPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
    }

    /**
     * Gets a single Cliente object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Cliente
     * @throws PropelException
     */
    public function getCliente(PropelPDO $con = null)
    {

        if ($this->singleCliente === null && !$this->isNew()) {
            $this->singleCliente = ClienteQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleCliente;
    }

    /**
     * Sets a single Cliente object as related to this object by a one-to-one relationship.
     *
     * @param             Cliente $v Cliente
     * @return Pessoa The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCliente(Cliente $v = null)
    {
        $this->singleCliente = $v;

        // Make sure that that the passed-in Cliente isn't already associated with this object
        if ($v !== null && $v->getPessoa(null, false) === null) {
            $v->setPessoa($this);
        }

        return $this;
    }

    /**
     * Gets a single Colaborador object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Colaborador
     * @throws PropelException
     */
    public function getColaborador(PropelPDO $con = null)
    {

        if ($this->singleColaborador === null && !$this->isNew()) {
            $this->singleColaborador = ColaboradorQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleColaborador;
    }

    /**
     * Sets a single Colaborador object as related to this object by a one-to-one relationship.
     *
     * @param             Colaborador $v Colaborador
     * @return Pessoa The current object (for fluent API support)
     * @throws PropelException
     */
    public function setColaborador(Colaborador $v = null)
    {
        $this->singleColaborador = $v;

        // Make sure that that the passed-in Colaborador isn't already associated with this object
        if ($v !== null && $v->getPessoa(null, false) === null) {
            $v->setPessoa($this);
        }

        return $this;
    }

    /**
     * Gets a single Representada object, which is related to this object by a one-to-one relationship.
     *
     * @param PropelPDO $con optional connection object
     * @return Representada
     * @throws PropelException
     */
    public function getRepresentada(PropelPDO $con = null)
    {

        if ($this->singleRepresentada === null && !$this->isNew()) {
            $this->singleRepresentada = RepresentadaQuery::create()->findPk($this->getPrimaryKey(), $con);
        }

        return $this->singleRepresentada;
    }

    /**
     * Sets a single Representada object as related to this object by a one-to-one relationship.
     *
     * @param             Representada $v Representada
     * @return Pessoa The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRepresentada(Representada $v = null)
    {
        $this->singleRepresentada = $v;

        // Make sure that that the passed-in Representada isn't already associated with this object
        if ($v !== null && $v->getPessoa(null, false) === null) {
            $v->setPessoa($this);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->co_pessoa = null;
        $this->no_pessoa = null;
        $this->nu_cpf = null;
        $this->nu_cnpj = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->singleCliente) {
                $this->singleCliente->clearAllReferences($deep);
            }
            if ($this->singleColaborador) {
                $this->singleColaborador->clearAllReferences($deep);
            }
            if ($this->singleRepresentada) {
                $this->singleRepresentada->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->singleCliente instanceof PropelCollection) {
            $this->singleCliente->clearIterator();
        }
        $this->singleCliente = null;
        if ($this->singleColaborador instanceof PropelCollection) {
            $this->singleColaborador->clearIterator();
        }
        $this->singleColaborador = null;
        if ($this->singleRepresentada instanceof PropelCollection) {
            $this->singleRepresentada->clearIterator();
        }
        $this->singleRepresentada = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PessoaPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
