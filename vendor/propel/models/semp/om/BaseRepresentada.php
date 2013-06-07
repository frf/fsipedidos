<?php


/**
 * Base class that represents a row from the 'representada.representada' table.
 *
 *
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseRepresentada extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'RepresentadaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RepresentadaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the co_representada field.
     * @var        int
     */
    protected $co_representada;

    /**
     * The value for the ds_razao_social field.
     * @var        string
     */
    protected $ds_razao_social;

    /**
     * The value for the dt_cadastro field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $dt_cadastro;

    /**
     * The value for the nu_comissao field.
     * @var        string
     */
    protected $nu_comissao;

    /**
     * The value for the ds_info_adicionais field.
     * @var        string
     */
    protected $ds_info_adicionais;

    /**
     * @var        Pessoa
     */
    protected $aPessoa;

    /**
     * @var        PropelObjectCollection|ProdutoRepresentada[] Collection to store aggregation of ProdutoRepresentada objects.
     */
    protected $collProdutoRepresentadas;
    protected $collProdutoRepresentadasPartial;

    /**
     * @var        PropelObjectCollection|RepresentadaColaborador[] Collection to store aggregation of RepresentadaColaborador objects.
     */
    protected $collRepresentadaColaboradors;
    protected $collRepresentadaColaboradorsPartial;

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
    protected $produtoRepresentadasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $representadaColaboradorsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of BaseRepresentada object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [co_representada] column value.
     *
     * @return int
     */
    public function getCoRepresentada()
    {
        return $this->co_representada;
    }

    /**
     * Get the [ds_razao_social] column value.
     *
     * @return string
     */
    public function getDsRazaoSocial()
    {
        return $this->ds_razao_social;
    }

    /**
     * Get the [optionally formatted] temporal [dt_cadastro] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDtCadastro($format = 'd-m-Y H:i:s')
    {
        if ($this->dt_cadastro === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->dt_cadastro);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dt_cadastro, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [nu_comissao] column value.
     *
     * @return string
     */
    public function getNuComissao()
    {
        return $this->nu_comissao;
    }

    /**
     * Get the [ds_info_adicionais] column value.
     *
     * @return string
     */
    public function getDsInfoAdicionais()
    {
        return $this->ds_info_adicionais;
    }

    /**
     * Set the value of [co_representada] column.
     *
     * @param int $v new value
     * @return Representada The current object (for fluent API support)
     */
    public function setCoRepresentada($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_representada !== $v) {
            $this->co_representada = $v;
            $this->modifiedColumns[] = RepresentadaPeer::CO_REPRESENTADA;
        }

        if ($this->aPessoa !== null && $this->aPessoa->getCoPessoa() !== $v) {
            $this->aPessoa = null;
        }


        return $this;
    } // setCoRepresentada()

    /**
     * Set the value of [ds_razao_social] column.
     *
     * @param string $v new value
     * @return Representada The current object (for fluent API support)
     */
    public function setDsRazaoSocial($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ds_razao_social !== $v) {
            $this->ds_razao_social = $v;
            $this->modifiedColumns[] = RepresentadaPeer::DS_RAZAO_SOCIAL;
        }


        return $this;
    } // setDsRazaoSocial()

    /**
     * Sets the value of [dt_cadastro] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Representada The current object (for fluent API support)
     */
    public function setDtCadastro($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dt_cadastro !== null || $dt !== null) {
            $currentDateAsString = ($this->dt_cadastro !== null && $tmpDt = new DateTime($this->dt_cadastro)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dt_cadastro = $newDateAsString;
                $this->modifiedColumns[] = RepresentadaPeer::DT_CADASTRO;
            }
        } // if either are not null


        return $this;
    } // setDtCadastro()

    /**
     * Set the value of [nu_comissao] column.
     *
     * @param string $v new value
     * @return Representada The current object (for fluent API support)
     */
    public function setNuComissao($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nu_comissao !== $v) {
            $this->nu_comissao = $v;
            $this->modifiedColumns[] = RepresentadaPeer::NU_COMISSAO;
        }


        return $this;
    } // setNuComissao()

    /**
     * Set the value of [ds_info_adicionais] column.
     *
     * @param string $v new value
     * @return Representada The current object (for fluent API support)
     */
    public function setDsInfoAdicionais($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ds_info_adicionais !== $v) {
            $this->ds_info_adicionais = $v;
            $this->modifiedColumns[] = RepresentadaPeer::DS_INFO_ADICIONAIS;
        }


        return $this;
    } // setDsInfoAdicionais()

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

            $this->co_representada = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->ds_razao_social = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->dt_cadastro = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nu_comissao = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->ds_info_adicionais = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 5; // 5 = RepresentadaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Representada object", $e);
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

        if ($this->aPessoa !== null && $this->co_representada !== $this->aPessoa->getCoPessoa()) {
            $this->aPessoa = null;
        }
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
            $con = Propel::getConnection(RepresentadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RepresentadaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPessoa = null;
            $this->collProdutoRepresentadas = null;

            $this->collRepresentadaColaboradors = null;

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
            $con = Propel::getConnection(RepresentadaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RepresentadaQuery::create()
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
            $con = Propel::getConnection(RepresentadaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RepresentadaPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPessoa !== null) {
                if ($this->aPessoa->isModified() || $this->aPessoa->isNew()) {
                    $affectedRows += $this->aPessoa->save($con);
                }
                $this->setPessoa($this->aPessoa);
            }

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

            if ($this->produtoRepresentadasScheduledForDeletion !== null) {
                if (!$this->produtoRepresentadasScheduledForDeletion->isEmpty()) {
                    ProdutoRepresentadaQuery::create()
                        ->filterByPrimaryKeys($this->produtoRepresentadasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->produtoRepresentadasScheduledForDeletion = null;
                }
            }

            if ($this->collProdutoRepresentadas !== null) {
                foreach ($this->collProdutoRepresentadas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->representadaColaboradorsScheduledForDeletion !== null) {
                if (!$this->representadaColaboradorsScheduledForDeletion->isEmpty()) {
                    RepresentadaColaboradorQuery::create()
                        ->filterByPrimaryKeys($this->representadaColaboradorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->representadaColaboradorsScheduledForDeletion = null;
                }
            }

            if ($this->collRepresentadaColaboradors !== null) {
                foreach ($this->collRepresentadaColaboradors as $referrerFK) {
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RepresentadaPeer::CO_REPRESENTADA)) {
            $modifiedColumns[':p' . $index++]  = 'co_representada';
        }
        if ($this->isColumnModified(RepresentadaPeer::DS_RAZAO_SOCIAL)) {
            $modifiedColumns[':p' . $index++]  = 'ds_razao_social';
        }
        if ($this->isColumnModified(RepresentadaPeer::DT_CADASTRO)) {
            $modifiedColumns[':p' . $index++]  = 'dt_cadastro';
        }
        if ($this->isColumnModified(RepresentadaPeer::NU_COMISSAO)) {
            $modifiedColumns[':p' . $index++]  = 'nu_comissao';
        }
        if ($this->isColumnModified(RepresentadaPeer::DS_INFO_ADICIONAIS)) {
            $modifiedColumns[':p' . $index++]  = 'ds_info_adicionais';
        }

        $sql = sprintf(
            'INSERT INTO representada.representada (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'co_representada':
                        $stmt->bindValue($identifier, $this->co_representada, PDO::PARAM_INT);
                        break;
                    case 'ds_razao_social':
                        $stmt->bindValue($identifier, $this->ds_razao_social, PDO::PARAM_STR);
                        break;
                    case 'dt_cadastro':
                        $stmt->bindValue($identifier, $this->dt_cadastro, PDO::PARAM_STR);
                        break;
                    case 'nu_comissao':
                        $stmt->bindValue($identifier, $this->nu_comissao, PDO::PARAM_STR);
                        break;
                    case 'ds_info_adicionais':
                        $stmt->bindValue($identifier, $this->ds_info_adicionais, PDO::PARAM_STR);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPessoa !== null) {
                if (!$this->aPessoa->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPessoa->getValidationFailures());
                }
            }


            if (($retval = RepresentadaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collProdutoRepresentadas !== null) {
                    foreach ($this->collProdutoRepresentadas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRepresentadaColaboradors !== null) {
                    foreach ($this->collRepresentadaColaboradors as $referrerFK) {
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
        $pos = RepresentadaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCoRepresentada();
                break;
            case 1:
                return $this->getDsRazaoSocial();
                break;
            case 2:
                return $this->getDtCadastro();
                break;
            case 3:
                return $this->getNuComissao();
                break;
            case 4:
                return $this->getDsInfoAdicionais();
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
        if (isset($alreadyDumpedObjects['Representada'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Representada'][$this->getPrimaryKey()] = true;
        $keys = RepresentadaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCoRepresentada(),
            $keys[1] => $this->getDsRazaoSocial(),
            $keys[2] => $this->getDtCadastro(),
            $keys[3] => $this->getNuComissao(),
            $keys[4] => $this->getDsInfoAdicionais(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPessoa) {
                $result['Pessoa'] = $this->aPessoa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collProdutoRepresentadas) {
                $result['ProdutoRepresentadas'] = $this->collProdutoRepresentadas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRepresentadaColaboradors) {
                $result['RepresentadaColaboradors'] = $this->collRepresentadaColaboradors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RepresentadaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCoRepresentada($value);
                break;
            case 1:
                $this->setDsRazaoSocial($value);
                break;
            case 2:
                $this->setDtCadastro($value);
                break;
            case 3:
                $this->setNuComissao($value);
                break;
            case 4:
                $this->setDsInfoAdicionais($value);
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
        $keys = RepresentadaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setCoRepresentada($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDsRazaoSocial($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDtCadastro($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNuComissao($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDsInfoAdicionais($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RepresentadaPeer::DATABASE_NAME);

        if ($this->isColumnModified(RepresentadaPeer::CO_REPRESENTADA)) $criteria->add(RepresentadaPeer::CO_REPRESENTADA, $this->co_representada);
        if ($this->isColumnModified(RepresentadaPeer::DS_RAZAO_SOCIAL)) $criteria->add(RepresentadaPeer::DS_RAZAO_SOCIAL, $this->ds_razao_social);
        if ($this->isColumnModified(RepresentadaPeer::DT_CADASTRO)) $criteria->add(RepresentadaPeer::DT_CADASTRO, $this->dt_cadastro);
        if ($this->isColumnModified(RepresentadaPeer::NU_COMISSAO)) $criteria->add(RepresentadaPeer::NU_COMISSAO, $this->nu_comissao);
        if ($this->isColumnModified(RepresentadaPeer::DS_INFO_ADICIONAIS)) $criteria->add(RepresentadaPeer::DS_INFO_ADICIONAIS, $this->ds_info_adicionais);

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
        $criteria = new Criteria(RepresentadaPeer::DATABASE_NAME);
        $criteria->add(RepresentadaPeer::CO_REPRESENTADA, $this->co_representada);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getCoRepresentada();
    }

    /**
     * Generic method to set the primary key (co_representada column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCoRepresentada($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getCoRepresentada();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Representada (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDsRazaoSocial($this->getDsRazaoSocial());
        $copyObj->setDtCadastro($this->getDtCadastro());
        $copyObj->setNuComissao($this->getNuComissao());
        $copyObj->setDsInfoAdicionais($this->getDsInfoAdicionais());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getProdutoRepresentadas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProdutoRepresentada($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRepresentadaColaboradors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRepresentadaColaborador($relObj->copy($deepCopy));
                }
            }

            $relObj = $this->getPessoa();
            if ($relObj) {
                $copyObj->setPessoa($relObj->copy($deepCopy));
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setCoRepresentada(NULL); // this is a auto-increment column, so set to default value
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
     * @return Representada Clone of current object.
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
     * @return RepresentadaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RepresentadaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Pessoa object.
     *
     * @param             Pessoa $v
     * @return Representada The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPessoa(Pessoa $v = null)
    {
        if ($v === null) {
            $this->setCoRepresentada(NULL);
        } else {
            $this->setCoRepresentada($v->getCoPessoa());
        }

        $this->aPessoa = $v;

        // Add binding for other direction of this 1:1 relationship.
        if ($v !== null) {
            $v->setRepresentada($this);
        }


        return $this;
    }


    /**
     * Get the associated Pessoa object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Pessoa The associated Pessoa object.
     * @throws PropelException
     */
    public function getPessoa(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPessoa === null && ($this->co_representada !== null) && $doQuery) {
            $this->aPessoa = PessoaQuery::create()->findPk($this->co_representada, $con);
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            $this->aPessoa->setRepresentada($this);
        }

        return $this->aPessoa;
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
        if ('ProdutoRepresentada' == $relationName) {
            $this->initProdutoRepresentadas();
        }
        if ('RepresentadaColaborador' == $relationName) {
            $this->initRepresentadaColaboradors();
        }
    }

    /**
     * Clears out the collProdutoRepresentadas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Representada The current object (for fluent API support)
     * @see        addProdutoRepresentadas()
     */
    public function clearProdutoRepresentadas()
    {
        $this->collProdutoRepresentadas = null; // important to set this to null since that means it is uninitialized
        $this->collProdutoRepresentadasPartial = null;

        return $this;
    }

    /**
     * reset is the collProdutoRepresentadas collection loaded partially
     *
     * @return void
     */
    public function resetPartialProdutoRepresentadas($v = true)
    {
        $this->collProdutoRepresentadasPartial = $v;
    }

    /**
     * Initializes the collProdutoRepresentadas collection.
     *
     * By default this just sets the collProdutoRepresentadas collection to an empty array (like clearcollProdutoRepresentadas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProdutoRepresentadas($overrideExisting = true)
    {
        if (null !== $this->collProdutoRepresentadas && !$overrideExisting) {
            return;
        }
        $this->collProdutoRepresentadas = new PropelObjectCollection();
        $this->collProdutoRepresentadas->setModel('ProdutoRepresentada');
    }

    /**
     * Gets an array of ProdutoRepresentada objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Representada is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ProdutoRepresentada[] List of ProdutoRepresentada objects
     * @throws PropelException
     */
    public function getProdutoRepresentadas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collProdutoRepresentadasPartial && !$this->isNew();
        if (null === $this->collProdutoRepresentadas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProdutoRepresentadas) {
                // return empty collection
                $this->initProdutoRepresentadas();
            } else {
                $collProdutoRepresentadas = ProdutoRepresentadaQuery::create(null, $criteria)
                    ->filterByRepresentada($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collProdutoRepresentadasPartial && count($collProdutoRepresentadas)) {
                      $this->initProdutoRepresentadas(false);

                      foreach($collProdutoRepresentadas as $obj) {
                        if (false == $this->collProdutoRepresentadas->contains($obj)) {
                          $this->collProdutoRepresentadas->append($obj);
                        }
                      }

                      $this->collProdutoRepresentadasPartial = true;
                    }

                    $collProdutoRepresentadas->getInternalIterator()->rewind();
                    return $collProdutoRepresentadas;
                }

                if($partial && $this->collProdutoRepresentadas) {
                    foreach($this->collProdutoRepresentadas as $obj) {
                        if($obj->isNew()) {
                            $collProdutoRepresentadas[] = $obj;
                        }
                    }
                }

                $this->collProdutoRepresentadas = $collProdutoRepresentadas;
                $this->collProdutoRepresentadasPartial = false;
            }
        }

        return $this->collProdutoRepresentadas;
    }

    /**
     * Sets a collection of ProdutoRepresentada objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $produtoRepresentadas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Representada The current object (for fluent API support)
     */
    public function setProdutoRepresentadas(PropelCollection $produtoRepresentadas, PropelPDO $con = null)
    {
        $produtoRepresentadasToDelete = $this->getProdutoRepresentadas(new Criteria(), $con)->diff($produtoRepresentadas);

        $this->produtoRepresentadasScheduledForDeletion = unserialize(serialize($produtoRepresentadasToDelete));

        foreach ($produtoRepresentadasToDelete as $produtoRepresentadaRemoved) {
            $produtoRepresentadaRemoved->setRepresentada(null);
        }

        $this->collProdutoRepresentadas = null;
        foreach ($produtoRepresentadas as $produtoRepresentada) {
            $this->addProdutoRepresentada($produtoRepresentada);
        }

        $this->collProdutoRepresentadas = $produtoRepresentadas;
        $this->collProdutoRepresentadasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProdutoRepresentada objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ProdutoRepresentada objects.
     * @throws PropelException
     */
    public function countProdutoRepresentadas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collProdutoRepresentadasPartial && !$this->isNew();
        if (null === $this->collProdutoRepresentadas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProdutoRepresentadas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getProdutoRepresentadas());
            }
            $query = ProdutoRepresentadaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRepresentada($this)
                ->count($con);
        }

        return count($this->collProdutoRepresentadas);
    }

    /**
     * Method called to associate a ProdutoRepresentada object to this object
     * through the ProdutoRepresentada foreign key attribute.
     *
     * @param    ProdutoRepresentada $l ProdutoRepresentada
     * @return Representada The current object (for fluent API support)
     */
    public function addProdutoRepresentada(ProdutoRepresentada $l)
    {
        if ($this->collProdutoRepresentadas === null) {
            $this->initProdutoRepresentadas();
            $this->collProdutoRepresentadasPartial = true;
        }
        if (!in_array($l, $this->collProdutoRepresentadas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddProdutoRepresentada($l);
        }

        return $this;
    }

    /**
     * @param	ProdutoRepresentada $produtoRepresentada The produtoRepresentada object to add.
     */
    protected function doAddProdutoRepresentada($produtoRepresentada)
    {
        $this->collProdutoRepresentadas[]= $produtoRepresentada;
        $produtoRepresentada->setRepresentada($this);
    }

    /**
     * @param	ProdutoRepresentada $produtoRepresentada The produtoRepresentada object to remove.
     * @return Representada The current object (for fluent API support)
     */
    public function removeProdutoRepresentada($produtoRepresentada)
    {
        if ($this->getProdutoRepresentadas()->contains($produtoRepresentada)) {
            $this->collProdutoRepresentadas->remove($this->collProdutoRepresentadas->search($produtoRepresentada));
            if (null === $this->produtoRepresentadasScheduledForDeletion) {
                $this->produtoRepresentadasScheduledForDeletion = clone $this->collProdutoRepresentadas;
                $this->produtoRepresentadasScheduledForDeletion->clear();
            }
            $this->produtoRepresentadasScheduledForDeletion[]= clone $produtoRepresentada;
            $produtoRepresentada->setRepresentada(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Representada is new, it will return
     * an empty collection; or if this Representada has previously
     * been saved, it will retrieve related ProdutoRepresentadas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Representada.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ProdutoRepresentada[] List of ProdutoRepresentada objects
     */
    public function getProdutoRepresentadasJoinMoeda($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ProdutoRepresentadaQuery::create(null, $criteria);
        $query->joinWith('Moeda', $join_behavior);

        return $this->getProdutoRepresentadas($query, $con);
    }

    /**
     * Clears out the collRepresentadaColaboradors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Representada The current object (for fluent API support)
     * @see        addRepresentadaColaboradors()
     */
    public function clearRepresentadaColaboradors()
    {
        $this->collRepresentadaColaboradors = null; // important to set this to null since that means it is uninitialized
        $this->collRepresentadaColaboradorsPartial = null;

        return $this;
    }

    /**
     * reset is the collRepresentadaColaboradors collection loaded partially
     *
     * @return void
     */
    public function resetPartialRepresentadaColaboradors($v = true)
    {
        $this->collRepresentadaColaboradorsPartial = $v;
    }

    /**
     * Initializes the collRepresentadaColaboradors collection.
     *
     * By default this just sets the collRepresentadaColaboradors collection to an empty array (like clearcollRepresentadaColaboradors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRepresentadaColaboradors($overrideExisting = true)
    {
        if (null !== $this->collRepresentadaColaboradors && !$overrideExisting) {
            return;
        }
        $this->collRepresentadaColaboradors = new PropelObjectCollection();
        $this->collRepresentadaColaboradors->setModel('RepresentadaColaborador');
    }

    /**
     * Gets an array of RepresentadaColaborador objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Representada is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RepresentadaColaborador[] List of RepresentadaColaborador objects
     * @throws PropelException
     */
    public function getRepresentadaColaboradors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRepresentadaColaboradorsPartial && !$this->isNew();
        if (null === $this->collRepresentadaColaboradors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRepresentadaColaboradors) {
                // return empty collection
                $this->initRepresentadaColaboradors();
            } else {
                $collRepresentadaColaboradors = RepresentadaColaboradorQuery::create(null, $criteria)
                    ->filterByRepresentada($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRepresentadaColaboradorsPartial && count($collRepresentadaColaboradors)) {
                      $this->initRepresentadaColaboradors(false);

                      foreach($collRepresentadaColaboradors as $obj) {
                        if (false == $this->collRepresentadaColaboradors->contains($obj)) {
                          $this->collRepresentadaColaboradors->append($obj);
                        }
                      }

                      $this->collRepresentadaColaboradorsPartial = true;
                    }

                    $collRepresentadaColaboradors->getInternalIterator()->rewind();
                    return $collRepresentadaColaboradors;
                }

                if($partial && $this->collRepresentadaColaboradors) {
                    foreach($this->collRepresentadaColaboradors as $obj) {
                        if($obj->isNew()) {
                            $collRepresentadaColaboradors[] = $obj;
                        }
                    }
                }

                $this->collRepresentadaColaboradors = $collRepresentadaColaboradors;
                $this->collRepresentadaColaboradorsPartial = false;
            }
        }

        return $this->collRepresentadaColaboradors;
    }

    /**
     * Sets a collection of RepresentadaColaborador objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $representadaColaboradors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Representada The current object (for fluent API support)
     */
    public function setRepresentadaColaboradors(PropelCollection $representadaColaboradors, PropelPDO $con = null)
    {
        $representadaColaboradorsToDelete = $this->getRepresentadaColaboradors(new Criteria(), $con)->diff($representadaColaboradors);

        $this->representadaColaboradorsScheduledForDeletion = unserialize(serialize($representadaColaboradorsToDelete));

        foreach ($representadaColaboradorsToDelete as $representadaColaboradorRemoved) {
            $representadaColaboradorRemoved->setRepresentada(null);
        }

        $this->collRepresentadaColaboradors = null;
        foreach ($representadaColaboradors as $representadaColaborador) {
            $this->addRepresentadaColaborador($representadaColaborador);
        }

        $this->collRepresentadaColaboradors = $representadaColaboradors;
        $this->collRepresentadaColaboradorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RepresentadaColaborador objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RepresentadaColaborador objects.
     * @throws PropelException
     */
    public function countRepresentadaColaboradors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRepresentadaColaboradorsPartial && !$this->isNew();
        if (null === $this->collRepresentadaColaboradors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRepresentadaColaboradors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRepresentadaColaboradors());
            }
            $query = RepresentadaColaboradorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRepresentada($this)
                ->count($con);
        }

        return count($this->collRepresentadaColaboradors);
    }

    /**
     * Method called to associate a RepresentadaColaborador object to this object
     * through the RepresentadaColaborador foreign key attribute.
     *
     * @param    RepresentadaColaborador $l RepresentadaColaborador
     * @return Representada The current object (for fluent API support)
     */
    public function addRepresentadaColaborador(RepresentadaColaborador $l)
    {
        if ($this->collRepresentadaColaboradors === null) {
            $this->initRepresentadaColaboradors();
            $this->collRepresentadaColaboradorsPartial = true;
        }
        if (!in_array($l, $this->collRepresentadaColaboradors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRepresentadaColaborador($l);
        }

        return $this;
    }

    /**
     * @param	RepresentadaColaborador $representadaColaborador The representadaColaborador object to add.
     */
    protected function doAddRepresentadaColaborador($representadaColaborador)
    {
        $this->collRepresentadaColaboradors[]= $representadaColaborador;
        $representadaColaborador->setRepresentada($this);
    }

    /**
     * @param	RepresentadaColaborador $representadaColaborador The representadaColaborador object to remove.
     * @return Representada The current object (for fluent API support)
     */
    public function removeRepresentadaColaborador($representadaColaborador)
    {
        if ($this->getRepresentadaColaboradors()->contains($representadaColaborador)) {
            $this->collRepresentadaColaboradors->remove($this->collRepresentadaColaboradors->search($representadaColaborador));
            if (null === $this->representadaColaboradorsScheduledForDeletion) {
                $this->representadaColaboradorsScheduledForDeletion = clone $this->collRepresentadaColaboradors;
                $this->representadaColaboradorsScheduledForDeletion->clear();
            }
            $this->representadaColaboradorsScheduledForDeletion[]= clone $representadaColaborador;
            $representadaColaborador->setRepresentada(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Representada is new, it will return
     * an empty collection; or if this Representada has previously
     * been saved, it will retrieve related RepresentadaColaboradors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Representada.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RepresentadaColaborador[] List of RepresentadaColaborador objects
     */
    public function getRepresentadaColaboradorsJoinColaborador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RepresentadaColaboradorQuery::create(null, $criteria);
        $query->joinWith('Colaborador', $join_behavior);

        return $this->getRepresentadaColaboradors($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->co_representada = null;
        $this->ds_razao_social = null;
        $this->dt_cadastro = null;
        $this->nu_comissao = null;
        $this->ds_info_adicionais = null;
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
            if ($this->collProdutoRepresentadas) {
                foreach ($this->collProdutoRepresentadas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRepresentadaColaboradors) {
                foreach ($this->collRepresentadaColaboradors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPessoa instanceof Persistent) {
              $this->aPessoa->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collProdutoRepresentadas instanceof PropelCollection) {
            $this->collProdutoRepresentadas->clearIterator();
        }
        $this->collProdutoRepresentadas = null;
        if ($this->collRepresentadaColaboradors instanceof PropelCollection) {
            $this->collRepresentadaColaboradors->clearIterator();
        }
        $this->collRepresentadaColaboradors = null;
        $this->aPessoa = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RepresentadaPeer::DEFAULT_STRING_FORMAT);
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
