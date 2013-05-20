<?php


/**
 * Base class that represents a row from the 'cliente.cliente' table.
 *
 *
 *
 * @package    propel.generator.semp.om
 */
abstract class BaseCliente extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'ClientePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        ClientePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the co_cliente field.
     * @var        int
     */
    protected $co_cliente;

    /**
     * The value for the ds_razao_social field.
     * @var        string
     */
    protected $ds_razao_social;

    /**
     * The value for the ds_inscricao_estadual field.
     * @var        string
     */
    protected $ds_inscricao_estadual;

    /**
     * The value for the st_suframa field.
     * @var        boolean
     */
    protected $st_suframa;

    /**
     * The value for the ds_ramo_atividade field.
     * @var        string
     */
    protected $ds_ramo_atividade;

    /**
     * The value for the dt_cadastro field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $dt_cadastro;

    /**
     * The value for the dt_fundacao field.
     * @var        string
     */
    protected $dt_fundacao;

    /**
     * @var        Pessoa
     */
    protected $aPessoa;

    /**
     * @var        PropelObjectCollection|ClienteColaborador[] Collection to store aggregation of ClienteColaborador objects.
     */
    protected $collClienteColaboradors;
    protected $collClienteColaboradorsPartial;

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
    protected $clienteColaboradorsScheduledForDeletion = null;

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
     * Initializes internal state of BaseCliente object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [co_cliente] column value.
     *
     * @return int
     */
    public function getCoCliente()
    {
        return $this->co_cliente;
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
     * Get the [ds_inscricao_estadual] column value.
     *
     * @return string
     */
    public function getDsInscricaoEstadual()
    {
        return $this->ds_inscricao_estadual;
    }

    /**
     * Get the [st_suframa] column value.
     *
     * @return boolean
     */
    public function getStSuframa()
    {
        return $this->st_suframa;
    }

    /**
     * Get the [ds_ramo_atividade] column value.
     *
     * @return string
     */
    public function getDsRamoAtividade()
    {
        return $this->ds_ramo_atividade;
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
     * Get the [optionally formatted] temporal [dt_fundacao] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDtFundacao($format = 'd-m-Y H:i:s')
    {
        if ($this->dt_fundacao === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->dt_fundacao);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dt_fundacao, true), $x);
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
     * Set the value of [co_cliente] column.
     *
     * @param int $v new value
     * @return Cliente The current object (for fluent API support)
     */
    public function setCoCliente($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_cliente !== $v) {
            $this->co_cliente = $v;
            $this->modifiedColumns[] = ClientePeer::CO_CLIENTE;
        }

        if ($this->aPessoa !== null && $this->aPessoa->getCoPessoa() !== $v) {
            $this->aPessoa = null;
        }


        return $this;
    } // setCoCliente()

    /**
     * Set the value of [ds_razao_social] column.
     *
     * @param string $v new value
     * @return Cliente The current object (for fluent API support)
     */
    public function setDsRazaoSocial($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ds_razao_social !== $v) {
            $this->ds_razao_social = $v;
            $this->modifiedColumns[] = ClientePeer::DS_RAZAO_SOCIAL;
        }


        return $this;
    } // setDsRazaoSocial()

    /**
     * Set the value of [ds_inscricao_estadual] column.
     *
     * @param string $v new value
     * @return Cliente The current object (for fluent API support)
     */
    public function setDsInscricaoEstadual($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ds_inscricao_estadual !== $v) {
            $this->ds_inscricao_estadual = $v;
            $this->modifiedColumns[] = ClientePeer::DS_INSCRICAO_ESTADUAL;
        }


        return $this;
    } // setDsInscricaoEstadual()

    /**
     * Sets the value of the [st_suframa] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Cliente The current object (for fluent API support)
     */
    public function setStSuframa($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->st_suframa !== $v) {
            $this->st_suframa = $v;
            $this->modifiedColumns[] = ClientePeer::ST_SUFRAMA;
        }


        return $this;
    } // setStSuframa()

    /**
     * Set the value of [ds_ramo_atividade] column.
     *
     * @param string $v new value
     * @return Cliente The current object (for fluent API support)
     */
    public function setDsRamoAtividade($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ds_ramo_atividade !== $v) {
            $this->ds_ramo_atividade = $v;
            $this->modifiedColumns[] = ClientePeer::DS_RAMO_ATIVIDADE;
        }


        return $this;
    } // setDsRamoAtividade()

    /**
     * Sets the value of [dt_cadastro] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Cliente The current object (for fluent API support)
     */
    public function setDtCadastro($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dt_cadastro !== null || $dt !== null) {
            $currentDateAsString = ($this->dt_cadastro !== null && $tmpDt = new DateTime($this->dt_cadastro)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dt_cadastro = $newDateAsString;
                $this->modifiedColumns[] = ClientePeer::DT_CADASTRO;
            }
        } // if either are not null


        return $this;
    } // setDtCadastro()

    /**
     * Sets the value of [dt_fundacao] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Cliente The current object (for fluent API support)
     */
    public function setDtFundacao($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dt_fundacao !== null || $dt !== null) {
            $currentDateAsString = ($this->dt_fundacao !== null && $tmpDt = new DateTime($this->dt_fundacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dt_fundacao = $newDateAsString;
                $this->modifiedColumns[] = ClientePeer::DT_FUNDACAO;
            }
        } // if either are not null


        return $this;
    } // setDtFundacao()

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

            $this->co_cliente = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->ds_razao_social = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->ds_inscricao_estadual = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->st_suframa = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->ds_ramo_atividade = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->dt_cadastro = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->dt_fundacao = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = ClientePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Cliente object", $e);
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

        if ($this->aPessoa !== null && $this->co_cliente !== $this->aPessoa->getCoPessoa()) {
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
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = ClientePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPessoa = null;
            $this->collClienteColaboradors = null;

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
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = ClienteQuery::create()
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
            $con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                ClientePeer::addInstanceToPool($this);
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

            if ($this->clienteColaboradorsScheduledForDeletion !== null) {
                if (!$this->clienteColaboradorsScheduledForDeletion->isEmpty()) {
                    ClienteColaboradorQuery::create()
                        ->filterByPrimaryKeys($this->clienteColaboradorsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->clienteColaboradorsScheduledForDeletion = null;
                }
            }

            if ($this->collClienteColaboradors !== null) {
                foreach ($this->collClienteColaboradors as $referrerFK) {
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
        if ($this->isColumnModified(ClientePeer::CO_CLIENTE)) {
            $modifiedColumns[':p' . $index++]  = 'co_cliente';
        }
        if ($this->isColumnModified(ClientePeer::DS_RAZAO_SOCIAL)) {
            $modifiedColumns[':p' . $index++]  = 'ds_razao_social';
        }
        if ($this->isColumnModified(ClientePeer::DS_INSCRICAO_ESTADUAL)) {
            $modifiedColumns[':p' . $index++]  = 'ds_inscricao_estadual';
        }
        if ($this->isColumnModified(ClientePeer::ST_SUFRAMA)) {
            $modifiedColumns[':p' . $index++]  = 'st_suframa';
        }
        if ($this->isColumnModified(ClientePeer::DS_RAMO_ATIVIDADE)) {
            $modifiedColumns[':p' . $index++]  = 'ds_ramo_atividade';
        }
        if ($this->isColumnModified(ClientePeer::DT_CADASTRO)) {
            $modifiedColumns[':p' . $index++]  = 'dt_cadastro';
        }
        if ($this->isColumnModified(ClientePeer::DT_FUNDACAO)) {
            $modifiedColumns[':p' . $index++]  = 'dt_fundacao';
        }

        $sql = sprintf(
            'INSERT INTO cliente.cliente (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'co_cliente':
                        $stmt->bindValue($identifier, $this->co_cliente, PDO::PARAM_INT);
                        break;
                    case 'ds_razao_social':
                        $stmt->bindValue($identifier, $this->ds_razao_social, PDO::PARAM_STR);
                        break;
                    case 'ds_inscricao_estadual':
                        $stmt->bindValue($identifier, $this->ds_inscricao_estadual, PDO::PARAM_STR);
                        break;
                    case 'st_suframa':
                        $stmt->bindValue($identifier, $this->st_suframa, PDO::PARAM_BOOL);
                        break;
                    case 'ds_ramo_atividade':
                        $stmt->bindValue($identifier, $this->ds_ramo_atividade, PDO::PARAM_STR);
                        break;
                    case 'dt_cadastro':
                        $stmt->bindValue($identifier, $this->dt_cadastro, PDO::PARAM_STR);
                        break;
                    case 'dt_fundacao':
                        $stmt->bindValue($identifier, $this->dt_fundacao, PDO::PARAM_STR);
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


            if (($retval = ClientePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collClienteColaboradors !== null) {
                    foreach ($this->collClienteColaboradors as $referrerFK) {
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
        $pos = ClientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCoCliente();
                break;
            case 1:
                return $this->getDsRazaoSocial();
                break;
            case 2:
                return $this->getDsInscricaoEstadual();
                break;
            case 3:
                return $this->getStSuframa();
                break;
            case 4:
                return $this->getDsRamoAtividade();
                break;
            case 5:
                return $this->getDtCadastro();
                break;
            case 6:
                return $this->getDtFundacao();
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
        if (isset($alreadyDumpedObjects['Cliente'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Cliente'][$this->getPrimaryKey()] = true;
        $keys = ClientePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCoCliente(),
            $keys[1] => $this->getDsRazaoSocial(),
            $keys[2] => $this->getDsInscricaoEstadual(),
            $keys[3] => $this->getStSuframa(),
            $keys[4] => $this->getDsRamoAtividade(),
            $keys[5] => $this->getDtCadastro(),
            $keys[6] => $this->getDtFundacao(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPessoa) {
                $result['Pessoa'] = $this->aPessoa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collClienteColaboradors) {
                $result['ClienteColaboradors'] = $this->collClienteColaboradors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = ClientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCoCliente($value);
                break;
            case 1:
                $this->setDsRazaoSocial($value);
                break;
            case 2:
                $this->setDsInscricaoEstadual($value);
                break;
            case 3:
                $this->setStSuframa($value);
                break;
            case 4:
                $this->setDsRamoAtividade($value);
                break;
            case 5:
                $this->setDtCadastro($value);
                break;
            case 6:
                $this->setDtFundacao($value);
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
        $keys = ClientePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setCoCliente($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDsRazaoSocial($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDsInscricaoEstadual($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setStSuframa($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDsRamoAtividade($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDtCadastro($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDtFundacao($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClientePeer::DATABASE_NAME);

        if ($this->isColumnModified(ClientePeer::CO_CLIENTE)) $criteria->add(ClientePeer::CO_CLIENTE, $this->co_cliente);
        if ($this->isColumnModified(ClientePeer::DS_RAZAO_SOCIAL)) $criteria->add(ClientePeer::DS_RAZAO_SOCIAL, $this->ds_razao_social);
        if ($this->isColumnModified(ClientePeer::DS_INSCRICAO_ESTADUAL)) $criteria->add(ClientePeer::DS_INSCRICAO_ESTADUAL, $this->ds_inscricao_estadual);
        if ($this->isColumnModified(ClientePeer::ST_SUFRAMA)) $criteria->add(ClientePeer::ST_SUFRAMA, $this->st_suframa);
        if ($this->isColumnModified(ClientePeer::DS_RAMO_ATIVIDADE)) $criteria->add(ClientePeer::DS_RAMO_ATIVIDADE, $this->ds_ramo_atividade);
        if ($this->isColumnModified(ClientePeer::DT_CADASTRO)) $criteria->add(ClientePeer::DT_CADASTRO, $this->dt_cadastro);
        if ($this->isColumnModified(ClientePeer::DT_FUNDACAO)) $criteria->add(ClientePeer::DT_FUNDACAO, $this->dt_fundacao);

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
        $criteria = new Criteria(ClientePeer::DATABASE_NAME);
        $criteria->add(ClientePeer::CO_CLIENTE, $this->co_cliente);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getCoCliente();
    }

    /**
     * Generic method to set the primary key (co_cliente column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setCoCliente($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getCoCliente();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Cliente (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDsRazaoSocial($this->getDsRazaoSocial());
        $copyObj->setDsInscricaoEstadual($this->getDsInscricaoEstadual());
        $copyObj->setStSuframa($this->getStSuframa());
        $copyObj->setDsRamoAtividade($this->getDsRamoAtividade());
        $copyObj->setDtCadastro($this->getDtCadastro());
        $copyObj->setDtFundacao($this->getDtFundacao());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getClienteColaboradors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClienteColaborador($relObj->copy($deepCopy));
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
            $copyObj->setCoCliente(NULL); // this is a auto-increment column, so set to default value
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
     * @return Cliente Clone of current object.
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
     * @return ClientePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new ClientePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Pessoa object.
     *
     * @param             Pessoa $v
     * @return Cliente The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPessoa(Pessoa $v = null)
    {
        if ($v === null) {
            $this->setCoCliente(NULL);
        } else {
            $this->setCoCliente($v->getCoPessoa());
        }

        $this->aPessoa = $v;

        // Add binding for other direction of this 1:1 relationship.
        if ($v !== null) {
            $v->setCliente($this);
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
        if ($this->aPessoa === null && ($this->co_cliente !== null) && $doQuery) {
            $this->aPessoa = PessoaQuery::create()->findPk($this->co_cliente, $con);
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            $this->aPessoa->setCliente($this);
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
        if ('ClienteColaborador' == $relationName) {
            $this->initClienteColaboradors();
        }
    }

    /**
     * Clears out the collClienteColaboradors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Cliente The current object (for fluent API support)
     * @see        addClienteColaboradors()
     */
    public function clearClienteColaboradors()
    {
        $this->collClienteColaboradors = null; // important to set this to null since that means it is uninitialized
        $this->collClienteColaboradorsPartial = null;

        return $this;
    }

    /**
     * reset is the collClienteColaboradors collection loaded partially
     *
     * @return void
     */
    public function resetPartialClienteColaboradors($v = true)
    {
        $this->collClienteColaboradorsPartial = $v;
    }

    /**
     * Initializes the collClienteColaboradors collection.
     *
     * By default this just sets the collClienteColaboradors collection to an empty array (like clearcollClienteColaboradors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClienteColaboradors($overrideExisting = true)
    {
        if (null !== $this->collClienteColaboradors && !$overrideExisting) {
            return;
        }
        $this->collClienteColaboradors = new PropelObjectCollection();
        $this->collClienteColaboradors->setModel('ClienteColaborador');
    }

    /**
     * Gets an array of ClienteColaborador objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Cliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|ClienteColaborador[] List of ClienteColaborador objects
     * @throws PropelException
     */
    public function getClienteColaboradors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collClienteColaboradorsPartial && !$this->isNew();
        if (null === $this->collClienteColaboradors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClienteColaboradors) {
                // return empty collection
                $this->initClienteColaboradors();
            } else {
                $collClienteColaboradors = ClienteColaboradorQuery::create(null, $criteria)
                    ->filterByCliente($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collClienteColaboradorsPartial && count($collClienteColaboradors)) {
                      $this->initClienteColaboradors(false);

                      foreach($collClienteColaboradors as $obj) {
                        if (false == $this->collClienteColaboradors->contains($obj)) {
                          $this->collClienteColaboradors->append($obj);
                        }
                      }

                      $this->collClienteColaboradorsPartial = true;
                    }

                    $collClienteColaboradors->getInternalIterator()->rewind();
                    return $collClienteColaboradors;
                }

                if($partial && $this->collClienteColaboradors) {
                    foreach($this->collClienteColaboradors as $obj) {
                        if($obj->isNew()) {
                            $collClienteColaboradors[] = $obj;
                        }
                    }
                }

                $this->collClienteColaboradors = $collClienteColaboradors;
                $this->collClienteColaboradorsPartial = false;
            }
        }

        return $this->collClienteColaboradors;
    }

    /**
     * Sets a collection of ClienteColaborador objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $clienteColaboradors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Cliente The current object (for fluent API support)
     */
    public function setClienteColaboradors(PropelCollection $clienteColaboradors, PropelPDO $con = null)
    {
        $clienteColaboradorsToDelete = $this->getClienteColaboradors(new Criteria(), $con)->diff($clienteColaboradors);

        $this->clienteColaboradorsScheduledForDeletion = unserialize(serialize($clienteColaboradorsToDelete));

        foreach ($clienteColaboradorsToDelete as $clienteColaboradorRemoved) {
            $clienteColaboradorRemoved->setCliente(null);
        }

        $this->collClienteColaboradors = null;
        foreach ($clienteColaboradors as $clienteColaborador) {
            $this->addClienteColaborador($clienteColaborador);
        }

        $this->collClienteColaboradors = $clienteColaboradors;
        $this->collClienteColaboradorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ClienteColaborador objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related ClienteColaborador objects.
     * @throws PropelException
     */
    public function countClienteColaboradors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collClienteColaboradorsPartial && !$this->isNew();
        if (null === $this->collClienteColaboradors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClienteColaboradors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getClienteColaboradors());
            }
            $query = ClienteColaboradorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCliente($this)
                ->count($con);
        }

        return count($this->collClienteColaboradors);
    }

    /**
     * Method called to associate a ClienteColaborador object to this object
     * through the ClienteColaborador foreign key attribute.
     *
     * @param    ClienteColaborador $l ClienteColaborador
     * @return Cliente The current object (for fluent API support)
     */
    public function addClienteColaborador(ClienteColaborador $l)
    {
        if ($this->collClienteColaboradors === null) {
            $this->initClienteColaboradors();
            $this->collClienteColaboradorsPartial = true;
        }
        if (!in_array($l, $this->collClienteColaboradors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddClienteColaborador($l);
        }

        return $this;
    }

    /**
     * @param	ClienteColaborador $clienteColaborador The clienteColaborador object to add.
     */
    protected function doAddClienteColaborador($clienteColaborador)
    {
        $this->collClienteColaboradors[]= $clienteColaborador;
        $clienteColaborador->setCliente($this);
    }

    /**
     * @param	ClienteColaborador $clienteColaborador The clienteColaborador object to remove.
     * @return Cliente The current object (for fluent API support)
     */
    public function removeClienteColaborador($clienteColaborador)
    {
        if ($this->getClienteColaboradors()->contains($clienteColaborador)) {
            $this->collClienteColaboradors->remove($this->collClienteColaboradors->search($clienteColaborador));
            if (null === $this->clienteColaboradorsScheduledForDeletion) {
                $this->clienteColaboradorsScheduledForDeletion = clone $this->collClienteColaboradors;
                $this->clienteColaboradorsScheduledForDeletion->clear();
            }
            $this->clienteColaboradorsScheduledForDeletion[]= clone $clienteColaborador;
            $clienteColaborador->setCliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cliente is new, it will return
     * an empty collection; or if this Cliente has previously
     * been saved, it will retrieve related ClienteColaboradors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cliente.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|ClienteColaborador[] List of ClienteColaborador objects
     */
    public function getClienteColaboradorsJoinColaborador($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ClienteColaboradorQuery::create(null, $criteria);
        $query->joinWith('Colaborador', $join_behavior);

        return $this->getClienteColaboradors($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->co_cliente = null;
        $this->ds_razao_social = null;
        $this->ds_inscricao_estadual = null;
        $this->st_suframa = null;
        $this->ds_ramo_atividade = null;
        $this->dt_cadastro = null;
        $this->dt_fundacao = null;
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
            if ($this->collClienteColaboradors) {
                foreach ($this->collClienteColaboradors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPessoa instanceof Persistent) {
              $this->aPessoa->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collClienteColaboradors instanceof PropelCollection) {
            $this->collClienteColaboradors->clearIterator();
        }
        $this->collClienteColaboradors = null;
        $this->aPessoa = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClientePeer::DEFAULT_STRING_FORMAT);
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
