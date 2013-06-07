<?php


/**
 * Base class that represents a row from the 'perfil' table.
 *
 *
 *
 * @package    propel.generator.semp.om
 */
abstract class BasePerfil extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PerfilPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PerfilPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the co_perfil field.
     * @var        int
     */
    protected $co_perfil;

    /**
     * The value for the no_perfil field.
     * @var        string
     */
    protected $no_perfil;

    /**
     * The value for the ds_perfil field.
     * @var        string
     */
    protected $ds_perfil;

    /**
     * The value for the st_perfil field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $st_perfil;

    /**
     * @var        PropelObjectCollection|Permissao[] Collection to store aggregation of Permissao objects.
     */
    protected $collPermissaos;
    protected $collPermissaosPartial;

    /**
     * @var        PropelObjectCollection|Usuario[] Collection to store aggregation of Usuario objects.
     */
    protected $collUsuarios;
    protected $collUsuariosPartial;

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
    protected $permissaosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usuariosScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->st_perfil = true;
    }

    /**
     * Initializes internal state of BasePerfil object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [co_perfil] column value.
     *
     * @return int
     */
    public function getCoPerfil()
    {
        return $this->co_perfil;
    }

    /**
     * Get the [no_perfil] column value.
     *
     * @return string
     */
    public function getNoPerfil()
    {
        return $this->no_perfil;
    }

    /**
     * Get the [ds_perfil] column value.
     *
     * @return string
     */
    public function getDsPerfil()
    {
        return $this->ds_perfil;
    }

    /**
     * Get the [st_perfil] column value.
     *
     * @return boolean
     */
    public function getStPerfil()
    {
        return $this->st_perfil;
    }

    /**
     * Set the value of [co_perfil] column.
     *
     * @param int $v new value
     * @return Perfil The current object (for fluent API support)
     */
    public function setCoPerfil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_perfil !== $v) {
            $this->co_perfil = $v;
            $this->modifiedColumns[] = PerfilPeer::CO_PERFIL;
        }


        return $this;
    } // setCoPerfil()

    /**
     * Set the value of [no_perfil] column.
     *
     * @param string $v new value
     * @return Perfil The current object (for fluent API support)
     */
    public function setNoPerfil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_perfil !== $v) {
            $this->no_perfil = $v;
            $this->modifiedColumns[] = PerfilPeer::NO_PERFIL;
        }


        return $this;
    } // setNoPerfil()

    /**
     * Set the value of [ds_perfil] column.
     *
     * @param string $v new value
     * @return Perfil The current object (for fluent API support)
     */
    public function setDsPerfil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ds_perfil !== $v) {
            $this->ds_perfil = $v;
            $this->modifiedColumns[] = PerfilPeer::DS_PERFIL;
        }


        return $this;
    } // setDsPerfil()

    /**
     * Sets the value of the [st_perfil] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Perfil The current object (for fluent API support)
     */
    public function setStPerfil($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->st_perfil !== $v) {
            $this->st_perfil = $v;
            $this->modifiedColumns[] = PerfilPeer::ST_PERFIL;
        }


        return $this;
    } // setStPerfil()

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
            if ($this->st_perfil !== true) {
                return false;
            }

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

            $this->co_perfil = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->no_perfil = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->ds_perfil = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->st_perfil = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 4; // 4 = PerfilPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Perfil object", $e);
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
            $con = Propel::getConnection(PerfilPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PerfilPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collPermissaos = null;

            $this->collUsuarios = null;

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
            $con = Propel::getConnection(PerfilPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PerfilQuery::create()
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
            $con = Propel::getConnection(PerfilPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PerfilPeer::addInstanceToPool($this);
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

            if ($this->permissaosScheduledForDeletion !== null) {
                if (!$this->permissaosScheduledForDeletion->isEmpty()) {
                    PermissaoQuery::create()
                        ->filterByPrimaryKeys($this->permissaosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->permissaosScheduledForDeletion = null;
                }
            }

            if ($this->collPermissaos !== null) {
                foreach ($this->collPermissaos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usuariosScheduledForDeletion !== null) {
                if (!$this->usuariosScheduledForDeletion->isEmpty()) {
                    foreach ($this->usuariosScheduledForDeletion as $usuario) {
                        // need to save related object because we set the relation to null
                        $usuario->save($con);
                    }
                    $this->usuariosScheduledForDeletion = null;
                }
            }

            if ($this->collUsuarios !== null) {
                foreach ($this->collUsuarios as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
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

        $this->modifiedColumns[] = PerfilPeer::CO_PERFIL;
        if (null !== $this->co_perfil) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PerfilPeer::CO_PERFIL . ')');
        }
        if (null === $this->co_perfil) {
            try {
                $stmt = $con->query("SELECT nextval('perfil_co_perfil_seq')");
                $row = $stmt->fetch(PDO::FETCH_NUM);
                $this->co_perfil = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PerfilPeer::CO_PERFIL)) {
            $modifiedColumns[':p' . $index++]  = 'co_perfil';
        }
        if ($this->isColumnModified(PerfilPeer::NO_PERFIL)) {
            $modifiedColumns[':p' . $index++]  = 'no_perfil';
        }
        if ($this->isColumnModified(PerfilPeer::DS_PERFIL)) {
            $modifiedColumns[':p' . $index++]  = 'ds_perfil';
        }
        if ($this->isColumnModified(PerfilPeer::ST_PERFIL)) {
            $modifiedColumns[':p' . $index++]  = 'st_perfil';
        }

        $sql = sprintf(
            'INSERT INTO perfil (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'co_perfil':
                        $stmt->bindValue($identifier, $this->co_perfil, PDO::PARAM_INT);
                        break;
                    case 'no_perfil':
                        $stmt->bindValue($identifier, $this->no_perfil, PDO::PARAM_STR);
                        break;
                    case 'ds_perfil':
                        $stmt->bindValue($identifier, $this->ds_perfil, PDO::PARAM_STR);
                        break;
                    case 'st_perfil':
                        $stmt->bindValue($identifier, $this->st_perfil, PDO::PARAM_BOOL);
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


            if (($retval = PerfilPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collPermissaos !== null) {
                    foreach ($this->collPermissaos as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsuarios !== null) {
                    foreach ($this->collUsuarios as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
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
        $pos = PerfilPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCoPerfil();
                break;
            case 1:
                return $this->getNoPerfil();
                break;
            case 2:
                return $this->getDsPerfil();
                break;
            case 3:
                return $this->getStPerfil();
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
        if (isset($alreadyDumpedObjects['Perfil'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Perfil'][$this->getPrimaryKey()] = true;
        $keys = PerfilPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCoPerfil(),
            $keys[1] => $this->getNoPerfil(),
            $keys[2] => $this->getDsPerfil(),
            $keys[3] => $this->getStPerfil(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collPermissaos) {
                $result['Permissaos'] = $this->collPermissaos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsuarios) {
                $result['Usuarios'] = $this->collUsuarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PerfilPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCoPerfil($value);
                break;
            case 1:
                $this->setNoPerfil($value);
                break;
            case 2:
                $this->setDsPerfil($value);
                break;
            case 3:
                $this->setStPerfil($value);
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
        $keys = PerfilPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setCoPerfil($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNoPerfil($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDsPerfil($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setStPerfil($arr[$keys[3]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PerfilPeer::DATABASE_NAME);

        if ($this->isColumnModified(PerfilPeer::CO_PERFIL)) $criteria->add(PerfilPeer::CO_PERFIL, $this->co_perfil);
        if ($this->isColumnModified(PerfilPeer::NO_PERFIL)) $criteria->add(PerfilPeer::NO_PERFIL, $this->no_perfil);
        if ($this->isColumnModified(PerfilPeer::DS_PERFIL)) $criteria->add(PerfilPeer::DS_PERFIL, $this->ds_perfil);
        if ($this->isColumnModified(PerfilPeer::ST_PERFIL)) $criteria->add(PerfilPeer::ST_PERFIL, $this->st_perfil);

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
        $criteria = new Criteria(PerfilPeer::DATABASE_NAME);
        $criteria->add(PerfilPeer::CO_PERFIL, $this->co_perfil);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getCoPerfil();
    }

    /**
     * Generic method to set the primary key (co_perfil column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCoPerfil($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getCoPerfil();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Perfil (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNoPerfil($this->getNoPerfil());
        $copyObj->setDsPerfil($this->getDsPerfil());
        $copyObj->setStPerfil($this->getStPerfil());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getPermissaos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPermissao($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsuarios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsuario($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCoPerfil(NULL); // this is a auto-increment column, so set to default value
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
     * @return Perfil Clone of current object.
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
     * @return PerfilPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PerfilPeer();
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
        if ('Permissao' == $relationName) {
            $this->initPermissaos();
        }
        if ('Usuario' == $relationName) {
            $this->initUsuarios();
        }
    }

    /**
     * Clears out the collPermissaos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Perfil The current object (for fluent API support)
     * @see        addPermissaos()
     */
    public function clearPermissaos()
    {
        $this->collPermissaos = null; // important to set this to null since that means it is uninitialized
        $this->collPermissaosPartial = null;

        return $this;
    }

    /**
     * reset is the collPermissaos collection loaded partially
     *
     * @return void
     */
    public function resetPartialPermissaos($v = true)
    {
        $this->collPermissaosPartial = $v;
    }

    /**
     * Initializes the collPermissaos collection.
     *
     * By default this just sets the collPermissaos collection to an empty array (like clearcollPermissaos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPermissaos($overrideExisting = true)
    {
        if (null !== $this->collPermissaos && !$overrideExisting) {
            return;
        }
        $this->collPermissaos = new PropelObjectCollection();
        $this->collPermissaos->setModel('Permissao');
    }

    /**
     * Gets an array of Permissao objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Perfil is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Permissao[] List of Permissao objects
     * @throws PropelException
     */
    public function getPermissaos($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPermissaosPartial && !$this->isNew();
        if (null === $this->collPermissaos || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPermissaos) {
                // return empty collection
                $this->initPermissaos();
            } else {
                $collPermissaos = PermissaoQuery::create(null, $criteria)
                    ->filterByPerfil($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPermissaosPartial && count($collPermissaos)) {
                      $this->initPermissaos(false);

                      foreach($collPermissaos as $obj) {
                        if (false == $this->collPermissaos->contains($obj)) {
                          $this->collPermissaos->append($obj);
                        }
                      }

                      $this->collPermissaosPartial = true;
                    }

                    $collPermissaos->getInternalIterator()->rewind();
                    return $collPermissaos;
                }

                if($partial && $this->collPermissaos) {
                    foreach($this->collPermissaos as $obj) {
                        if($obj->isNew()) {
                            $collPermissaos[] = $obj;
                        }
                    }
                }

                $this->collPermissaos = $collPermissaos;
                $this->collPermissaosPartial = false;
            }
        }

        return $this->collPermissaos;
    }

    /**
     * Sets a collection of Permissao objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $permissaos A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Perfil The current object (for fluent API support)
     */
    public function setPermissaos(PropelCollection $permissaos, PropelPDO $con = null)
    {
        $permissaosToDelete = $this->getPermissaos(new Criteria(), $con)->diff($permissaos);

        $this->permissaosScheduledForDeletion = unserialize(serialize($permissaosToDelete));

        foreach ($permissaosToDelete as $permissaoRemoved) {
            $permissaoRemoved->setPerfil(null);
        }

        $this->collPermissaos = null;
        foreach ($permissaos as $permissao) {
            $this->addPermissao($permissao);
        }

        $this->collPermissaos = $permissaos;
        $this->collPermissaosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Permissao objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Permissao objects.
     * @throws PropelException
     */
    public function countPermissaos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPermissaosPartial && !$this->isNew();
        if (null === $this->collPermissaos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPermissaos) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPermissaos());
            }
            $query = PermissaoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPerfil($this)
                ->count($con);
        }

        return count($this->collPermissaos);
    }

    /**
     * Method called to associate a Permissao object to this object
     * through the Permissao foreign key attribute.
     *
     * @param    Permissao $l Permissao
     * @return Perfil The current object (for fluent API support)
     */
    public function addPermissao(Permissao $l)
    {
        if ($this->collPermissaos === null) {
            $this->initPermissaos();
            $this->collPermissaosPartial = true;
        }
        if (!in_array($l, $this->collPermissaos->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPermissao($l);
        }

        return $this;
    }

    /**
     * @param	Permissao $permissao The permissao object to add.
     */
    protected function doAddPermissao($permissao)
    {
        $this->collPermissaos[]= $permissao;
        $permissao->setPerfil($this);
    }

    /**
     * @param	Permissao $permissao The permissao object to remove.
     * @return Perfil The current object (for fluent API support)
     */
    public function removePermissao($permissao)
    {
        if ($this->getPermissaos()->contains($permissao)) {
            $this->collPermissaos->remove($this->collPermissaos->search($permissao));
            if (null === $this->permissaosScheduledForDeletion) {
                $this->permissaosScheduledForDeletion = clone $this->collPermissaos;
                $this->permissaosScheduledForDeletion->clear();
            }
            $this->permissaosScheduledForDeletion[]= clone $permissao;
            $permissao->setPerfil(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Perfil is new, it will return
     * an empty collection; or if this Perfil has previously
     * been saved, it will retrieve related Permissaos from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Perfil.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Permissao[] List of Permissao objects
     */
    public function getPermissaosJoinRecurso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PermissaoQuery::create(null, $criteria);
        $query->joinWith('Recurso', $join_behavior);

        return $this->getPermissaos($query, $con);
    }

    /**
     * Clears out the collUsuarios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Perfil The current object (for fluent API support)
     * @see        addUsuarios()
     */
    public function clearUsuarios()
    {
        $this->collUsuarios = null; // important to set this to null since that means it is uninitialized
        $this->collUsuariosPartial = null;

        return $this;
    }

    /**
     * reset is the collUsuarios collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsuarios($v = true)
    {
        $this->collUsuariosPartial = $v;
    }

    /**
     * Initializes the collUsuarios collection.
     *
     * By default this just sets the collUsuarios collection to an empty array (like clearcollUsuarios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsuarios($overrideExisting = true)
    {
        if (null !== $this->collUsuarios && !$overrideExisting) {
            return;
        }
        $this->collUsuarios = new PropelObjectCollection();
        $this->collUsuarios->setModel('Usuario');
    }

    /**
     * Gets an array of Usuario objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Perfil is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Usuario[] List of Usuario objects
     * @throws PropelException
     */
    public function getUsuarios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsuariosPartial && !$this->isNew();
        if (null === $this->collUsuarios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsuarios) {
                // return empty collection
                $this->initUsuarios();
            } else {
                $collUsuarios = UsuarioQuery::create(null, $criteria)
                    ->filterByPerfil($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsuariosPartial && count($collUsuarios)) {
                      $this->initUsuarios(false);

                      foreach($collUsuarios as $obj) {
                        if (false == $this->collUsuarios->contains($obj)) {
                          $this->collUsuarios->append($obj);
                        }
                      }

                      $this->collUsuariosPartial = true;
                    }

                    $collUsuarios->getInternalIterator()->rewind();
                    return $collUsuarios;
                }

                if($partial && $this->collUsuarios) {
                    foreach($this->collUsuarios as $obj) {
                        if($obj->isNew()) {
                            $collUsuarios[] = $obj;
                        }
                    }
                }

                $this->collUsuarios = $collUsuarios;
                $this->collUsuariosPartial = false;
            }
        }

        return $this->collUsuarios;
    }

    /**
     * Sets a collection of Usuario objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usuarios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Perfil The current object (for fluent API support)
     */
    public function setUsuarios(PropelCollection $usuarios, PropelPDO $con = null)
    {
        $usuariosToDelete = $this->getUsuarios(new Criteria(), $con)->diff($usuarios);

        $this->usuariosScheduledForDeletion = unserialize(serialize($usuariosToDelete));

        foreach ($usuariosToDelete as $usuarioRemoved) {
            $usuarioRemoved->setPerfil(null);
        }

        $this->collUsuarios = null;
        foreach ($usuarios as $usuario) {
            $this->addUsuario($usuario);
        }

        $this->collUsuarios = $usuarios;
        $this->collUsuariosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Usuario objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Usuario objects.
     * @throws PropelException
     */
    public function countUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsuariosPartial && !$this->isNew();
        if (null === $this->collUsuarios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsuarios) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getUsuarios());
            }
            $query = UsuarioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPerfil($this)
                ->count($con);
        }

        return count($this->collUsuarios);
    }

    /**
     * Method called to associate a Usuario object to this object
     * through the Usuario foreign key attribute.
     *
     * @param    Usuario $l Usuario
     * @return Perfil The current object (for fluent API support)
     */
    public function addUsuario(Usuario $l)
    {
        if ($this->collUsuarios === null) {
            $this->initUsuarios();
            $this->collUsuariosPartial = true;
        }
        if (!in_array($l, $this->collUsuarios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUsuario($l);
        }

        return $this;
    }

    /**
     * @param	Usuario $usuario The usuario object to add.
     */
    protected function doAddUsuario($usuario)
    {
        $this->collUsuarios[]= $usuario;
        $usuario->setPerfil($this);
    }

    /**
     * @param	Usuario $usuario The usuario object to remove.
     * @return Perfil The current object (for fluent API support)
     */
    public function removeUsuario($usuario)
    {
        if ($this->getUsuarios()->contains($usuario)) {
            $this->collUsuarios->remove($this->collUsuarios->search($usuario));
            if (null === $this->usuariosScheduledForDeletion) {
                $this->usuariosScheduledForDeletion = clone $this->collUsuarios;
                $this->usuariosScheduledForDeletion->clear();
            }
            $this->usuariosScheduledForDeletion[]= $usuario;
            $usuario->setPerfil(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Perfil is new, it will return
     * an empty collection; or if this Perfil has previously
     * been saved, it will retrieve related Usuarios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Perfil.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Usuario[] List of Usuario objects
     */
    public function getUsuariosJoinPessoa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UsuarioQuery::create(null, $criteria);
        $query->joinWith('Pessoa', $join_behavior);

        return $this->getUsuarios($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->co_perfil = null;
        $this->no_perfil = null;
        $this->ds_perfil = null;
        $this->st_perfil = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
            if ($this->collPermissaos) {
                foreach ($this->collPermissaos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsuarios) {
                foreach ($this->collUsuarios as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collPermissaos instanceof PropelCollection) {
            $this->collPermissaos->clearIterator();
        }
        $this->collPermissaos = null;
        if ($this->collUsuarios instanceof PropelCollection) {
            $this->collUsuarios->clearIterator();
        }
        $this->collUsuarios = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PerfilPeer::DEFAULT_STRING_FORMAT);
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
