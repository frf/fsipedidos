<?php


/**
 * Base class that represents a row from the 'sistema' table.
 *
 *
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseSistema extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SistemaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SistemaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the co_sistema field.
     * @var        int
     */
    protected $co_sistema;

    /**
     * The value for the no_empresa field.
     * @var        string
     */
    protected $no_empresa;

    /**
     * The value for the no_dominio field.
     * @var        string
     */
    protected $no_dominio;

    /**
     * @var        PropelObjectCollection|Colaborador[] Collection to store aggregation of Colaborador objects.
     */
    protected $collColaboradors;
    protected $collColaboradorsPartial;

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
    protected $colaboradorsScheduledForDeletion = null;

    /**
     * Get the [co_sistema] column value.
     *
     * @return int
     */
    public function getCoSistema()
    {
        return $this->co_sistema;
    }

    /**
     * Get the [no_empresa] column value.
     *
     * @return string
     */
    public function getNoEmpresa()
    {
        return $this->no_empresa;
    }

    /**
     * Get the [no_dominio] column value.
     *
     * @return string
     */
    public function getNoDominio()
    {
        return $this->no_dominio;
    }

    /**
     * Set the value of [co_sistema] column.
     *
     * @param int $v new value
     * @return Sistema The current object (for fluent API support)
     */
    public function setCoSistema($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_sistema !== $v) {
            $this->co_sistema = $v;
            $this->modifiedColumns[] = SistemaPeer::CO_SISTEMA;
        }


        return $this;
    } // setCoSistema()

    /**
     * Set the value of [no_empresa] column.
     *
     * @param string $v new value
     * @return Sistema The current object (for fluent API support)
     */
    public function setNoEmpresa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_empresa !== $v) {
            $this->no_empresa = $v;
            $this->modifiedColumns[] = SistemaPeer::NO_EMPRESA;
        }


        return $this;
    } // setNoEmpresa()

    /**
     * Set the value of [no_dominio] column.
     *
     * @param string $v new value
     * @return Sistema The current object (for fluent API support)
     */
    public function setNoDominio($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_dominio !== $v) {
            $this->no_dominio = $v;
            $this->modifiedColumns[] = SistemaPeer::NO_DOMINIO;
        }


        return $this;
    } // setNoDominio()

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

            $this->co_sistema = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->no_empresa = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->no_dominio = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 3; // 3 = SistemaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Sistema object", $e);
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
            $con = Propel::getConnection(SistemaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SistemaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collColaboradors = null;

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
            $con = Propel::getConnection(SistemaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SistemaQuery::create()
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
            $con = Propel::getConnection(SistemaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SistemaPeer::addInstanceToPool($this);
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

            if ($this->colaboradorsScheduledForDeletion !== null) {
                if (!$this->colaboradorsScheduledForDeletion->isEmpty()) {
                    ColaboradorQuery::create()
                        ->filterByPrimaryKeys($this->colaboradorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->colaboradorsScheduledForDeletion = null;
                }
            }

            if ($this->collColaboradors !== null) {
                foreach ($this->collColaboradors as $referrerFK) {
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

        $this->modifiedColumns[] = SistemaPeer::CO_SISTEMA;
        if (null !== $this->co_sistema) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SistemaPeer::CO_SISTEMA . ')');
        }
        if (null === $this->co_sistema) {
            try {
                $stmt = $con->query("SELECT nextval('sistema_co_sistema_seq')");
                $row = $stmt->fetch(PDO::FETCH_NUM);
                $this->co_sistema = $row[0];
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SistemaPeer::CO_SISTEMA)) {
            $modifiedColumns[':p' . $index++]  = 'co_sistema';
        }
        if ($this->isColumnModified(SistemaPeer::NO_EMPRESA)) {
            $modifiedColumns[':p' . $index++]  = 'no_empresa';
        }
        if ($this->isColumnModified(SistemaPeer::NO_DOMINIO)) {
            $modifiedColumns[':p' . $index++]  = 'no_dominio';
        }

        $sql = sprintf(
            'INSERT INTO sistema (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'co_sistema':
                        $stmt->bindValue($identifier, $this->co_sistema, PDO::PARAM_INT);
                        break;
                    case 'no_empresa':
                        $stmt->bindValue($identifier, $this->no_empresa, PDO::PARAM_STR);
                        break;
                    case 'no_dominio':
                        $stmt->bindValue($identifier, $this->no_dominio, PDO::PARAM_STR);
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


            if (($retval = SistemaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collColaboradors !== null) {
                    foreach ($this->collColaboradors as $referrerFK) {
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
        $pos = SistemaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCoSistema();
                break;
            case 1:
                return $this->getNoEmpresa();
                break;
            case 2:
                return $this->getNoDominio();
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
        if (isset($alreadyDumpedObjects['Sistema'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Sistema'][$this->getPrimaryKey()] = true;
        $keys = SistemaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCoSistema(),
            $keys[1] => $this->getNoEmpresa(),
            $keys[2] => $this->getNoDominio(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collColaboradors) {
                $result['Colaboradors'] = $this->collColaboradors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SistemaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCoSistema($value);
                break;
            case 1:
                $this->setNoEmpresa($value);
                break;
            case 2:
                $this->setNoDominio($value);
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
        $keys = SistemaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setCoSistema($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNoEmpresa($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNoDominio($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SistemaPeer::DATABASE_NAME);

        if ($this->isColumnModified(SistemaPeer::CO_SISTEMA)) $criteria->add(SistemaPeer::CO_SISTEMA, $this->co_sistema);
        if ($this->isColumnModified(SistemaPeer::NO_EMPRESA)) $criteria->add(SistemaPeer::NO_EMPRESA, $this->no_empresa);
        if ($this->isColumnModified(SistemaPeer::NO_DOMINIO)) $criteria->add(SistemaPeer::NO_DOMINIO, $this->no_dominio);

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
        $criteria = new Criteria(SistemaPeer::DATABASE_NAME);
        $criteria->add(SistemaPeer::CO_SISTEMA, $this->co_sistema);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getCoSistema();
    }

    /**
     * Generic method to set the primary key (co_sistema column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCoSistema($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getCoSistema();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Sistema (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNoEmpresa($this->getNoEmpresa());
        $copyObj->setNoDominio($this->getNoDominio());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getColaboradors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addColaborador($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCoSistema(NULL); // this is a auto-increment column, so set to default value
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
     * @return Sistema Clone of current object.
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
     * @return SistemaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SistemaPeer();
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
        if ('Colaborador' == $relationName) {
            $this->initColaboradors();
        }
    }

    /**
     * Clears out the collColaboradors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Sistema The current object (for fluent API support)
     * @see        addColaboradors()
     */
    public function clearColaboradors()
    {
        $this->collColaboradors = null; // important to set this to null since that means it is uninitialized
        $this->collColaboradorsPartial = null;

        return $this;
    }

    /**
     * reset is the collColaboradors collection loaded partially
     *
     * @return void
     */
    public function resetPartialColaboradors($v = true)
    {
        $this->collColaboradorsPartial = $v;
    }

    /**
     * Initializes the collColaboradors collection.
     *
     * By default this just sets the collColaboradors collection to an empty array (like clearcollColaboradors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initColaboradors($overrideExisting = true)
    {
        if (null !== $this->collColaboradors && !$overrideExisting) {
            return;
        }
        $this->collColaboradors = new PropelObjectCollection();
        $this->collColaboradors->setModel('Colaborador');
    }

    /**
     * Gets an array of Colaborador objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Sistema is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Colaborador[] List of Colaborador objects
     * @throws PropelException
     */
    public function getColaboradors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collColaboradorsPartial && !$this->isNew();
        if (null === $this->collColaboradors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collColaboradors) {
                // return empty collection
                $this->initColaboradors();
            } else {
                $collColaboradors = ColaboradorQuery::create(null, $criteria)
                    ->filterBySistema($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collColaboradorsPartial && count($collColaboradors)) {
                      $this->initColaboradors(false);

                      foreach($collColaboradors as $obj) {
                        if (false == $this->collColaboradors->contains($obj)) {
                          $this->collColaboradors->append($obj);
                        }
                      }

                      $this->collColaboradorsPartial = true;
                    }

                    $collColaboradors->getInternalIterator()->rewind();
                    return $collColaboradors;
                }

                if($partial && $this->collColaboradors) {
                    foreach($this->collColaboradors as $obj) {
                        if($obj->isNew()) {
                            $collColaboradors[] = $obj;
                        }
                    }
                }

                $this->collColaboradors = $collColaboradors;
                $this->collColaboradorsPartial = false;
            }
        }

        return $this->collColaboradors;
    }

    /**
     * Sets a collection of Colaborador objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $colaboradors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Sistema The current object (for fluent API support)
     */
    public function setColaboradors(PropelCollection $colaboradors, PropelPDO $con = null)
    {
        $colaboradorsToDelete = $this->getColaboradors(new Criteria(), $con)->diff($colaboradors);

        $this->colaboradorsScheduledForDeletion = unserialize(serialize($colaboradorsToDelete));

        foreach ($colaboradorsToDelete as $colaboradorRemoved) {
            $colaboradorRemoved->setSistema(null);
        }

        $this->collColaboradors = null;
        foreach ($colaboradors as $colaborador) {
            $this->addColaborador($colaborador);
        }

        $this->collColaboradors = $colaboradors;
        $this->collColaboradorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Colaborador objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Colaborador objects.
     * @throws PropelException
     */
    public function countColaboradors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collColaboradorsPartial && !$this->isNew();
        if (null === $this->collColaboradors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collColaboradors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getColaboradors());
            }
            $query = ColaboradorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySistema($this)
                ->count($con);
        }

        return count($this->collColaboradors);
    }

    /**
     * Method called to associate a Colaborador object to this object
     * through the Colaborador foreign key attribute.
     *
     * @param    Colaborador $l Colaborador
     * @return Sistema The current object (for fluent API support)
     */
    public function addColaborador(Colaborador $l)
    {
        if ($this->collColaboradors === null) {
            $this->initColaboradors();
            $this->collColaboradorsPartial = true;
        }
        if (!in_array($l, $this->collColaboradors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddColaborador($l);
        }

        return $this;
    }

    /**
     * @param	Colaborador $colaborador The colaborador object to add.
     */
    protected function doAddColaborador($colaborador)
    {
        $this->collColaboradors[]= $colaborador;
        $colaborador->setSistema($this);
    }

    /**
     * @param	Colaborador $colaborador The colaborador object to remove.
     * @return Sistema The current object (for fluent API support)
     */
    public function removeColaborador($colaborador)
    {
        if ($this->getColaboradors()->contains($colaborador)) {
            $this->collColaboradors->remove($this->collColaboradors->search($colaborador));
            if (null === $this->colaboradorsScheduledForDeletion) {
                $this->colaboradorsScheduledForDeletion = clone $this->collColaboradors;
                $this->colaboradorsScheduledForDeletion->clear();
            }
            $this->colaboradorsScheduledForDeletion[]= clone $colaborador;
            $colaborador->setSistema(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->co_sistema = null;
        $this->no_empresa = null;
        $this->no_dominio = null;
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
            if ($this->collColaboradors) {
                foreach ($this->collColaboradors as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collColaboradors instanceof PropelCollection) {
            $this->collColaboradors->clearIterator();
        }
        $this->collColaboradors = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SistemaPeer::DEFAULT_STRING_FORMAT);
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
