<?php


/**
 * Base class that represents a row from the 'permissao' table.
 *
 *
 *
 * @package    propel.generator.semp.om
 */
abstract class BasePermissao extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PermissaoPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PermissaoPeer
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
     * The value for the dt_alteracao field.
     * @var        string
     */
    protected $dt_alteracao;

    /**
     * The value for the co_usuario_alteracao field.
     * @var        int
     */
    protected $co_usuario_alteracao;

    /**
     * The value for the co_recurso field.
     * @var        int
     */
    protected $co_recurso;

    /**
     * The value for the st_permissao field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $st_permissao;

    /**
     * The value for the dt_cadastro field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $dt_cadastro;

    /**
     * The value for the co_usuario_cadastro field.
     * @var        int
     */
    protected $co_usuario_cadastro;

    /**
     * @var        Perfil
     */
    protected $aPerfil;

    /**
     * @var        Recurso
     */
    protected $aRecurso;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->st_permissao = true;
    }

    /**
     * Initializes internal state of BasePermissao object.
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
     * Get the [optionally formatted] temporal [dt_alteracao] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDtAlteracao($format = 'd-m-Y H:i:s')
    {
        if ($this->dt_alteracao === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->dt_alteracao);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->dt_alteracao, true), $x);
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
     * Get the [co_usuario_alteracao] column value.
     *
     * @return int
     */
    public function getCoUsuarioAlteracao()
    {
        return $this->co_usuario_alteracao;
    }

    /**
     * Get the [co_recurso] column value.
     *
     * @return int
     */
    public function getCoRecurso()
    {
        return $this->co_recurso;
    }

    /**
     * Get the [st_permissao] column value.
     *
     * @return boolean
     */
    public function getStPermissao()
    {
        return $this->st_permissao;
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
     * Get the [co_usuario_cadastro] column value.
     *
     * @return int
     */
    public function getCoUsuarioCadastro()
    {
        return $this->co_usuario_cadastro;
    }

    /**
     * Set the value of [co_perfil] column.
     *
     * @param int $v new value
     * @return Permissao The current object (for fluent API support)
     */
    public function setCoPerfil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_perfil !== $v) {
            $this->co_perfil = $v;
            $this->modifiedColumns[] = PermissaoPeer::CO_PERFIL;
        }

        if ($this->aPerfil !== null && $this->aPerfil->getCoPerfil() !== $v) {
            $this->aPerfil = null;
        }


        return $this;
    } // setCoPerfil()

    /**
     * Sets the value of [dt_alteracao] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Permissao The current object (for fluent API support)
     */
    public function setDtAlteracao($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dt_alteracao !== null || $dt !== null) {
            $currentDateAsString = ($this->dt_alteracao !== null && $tmpDt = new DateTime($this->dt_alteracao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dt_alteracao = $newDateAsString;
                $this->modifiedColumns[] = PermissaoPeer::DT_ALTERACAO;
            }
        } // if either are not null


        return $this;
    } // setDtAlteracao()

    /**
     * Set the value of [co_usuario_alteracao] column.
     *
     * @param int $v new value
     * @return Permissao The current object (for fluent API support)
     */
    public function setCoUsuarioAlteracao($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_usuario_alteracao !== $v) {
            $this->co_usuario_alteracao = $v;
            $this->modifiedColumns[] = PermissaoPeer::CO_USUARIO_ALTERACAO;
        }


        return $this;
    } // setCoUsuarioAlteracao()

    /**
     * Set the value of [co_recurso] column.
     *
     * @param int $v new value
     * @return Permissao The current object (for fluent API support)
     */
    public function setCoRecurso($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_recurso !== $v) {
            $this->co_recurso = $v;
            $this->modifiedColumns[] = PermissaoPeer::CO_RECURSO;
        }

        if ($this->aRecurso !== null && $this->aRecurso->getCoRecurso() !== $v) {
            $this->aRecurso = null;
        }


        return $this;
    } // setCoRecurso()

    /**
     * Sets the value of the [st_permissao] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Permissao The current object (for fluent API support)
     */
    public function setStPermissao($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->st_permissao !== $v) {
            $this->st_permissao = $v;
            $this->modifiedColumns[] = PermissaoPeer::ST_PERMISSAO;
        }


        return $this;
    } // setStPermissao()

    /**
     * Sets the value of [dt_cadastro] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Permissao The current object (for fluent API support)
     */
    public function setDtCadastro($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->dt_cadastro !== null || $dt !== null) {
            $currentDateAsString = ($this->dt_cadastro !== null && $tmpDt = new DateTime($this->dt_cadastro)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->dt_cadastro = $newDateAsString;
                $this->modifiedColumns[] = PermissaoPeer::DT_CADASTRO;
            }
        } // if either are not null


        return $this;
    } // setDtCadastro()

    /**
     * Set the value of [co_usuario_cadastro] column.
     *
     * @param int $v new value
     * @return Permissao The current object (for fluent API support)
     */
    public function setCoUsuarioCadastro($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->co_usuario_cadastro !== $v) {
            $this->co_usuario_cadastro = $v;
            $this->modifiedColumns[] = PermissaoPeer::CO_USUARIO_CADASTRO;
        }


        return $this;
    } // setCoUsuarioCadastro()

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
            if ($this->st_permissao !== true) {
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
            $this->dt_alteracao = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->co_usuario_alteracao = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->co_recurso = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->st_permissao = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
            $this->dt_cadastro = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->co_usuario_cadastro = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 7; // 7 = PermissaoPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Permissao object", $e);
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

        if ($this->aPerfil !== null && $this->co_perfil !== $this->aPerfil->getCoPerfil()) {
            $this->aPerfil = null;
        }
        if ($this->aRecurso !== null && $this->co_recurso !== $this->aRecurso->getCoRecurso()) {
            $this->aRecurso = null;
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
            $con = Propel::getConnection(PermissaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PermissaoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPerfil = null;
            $this->aRecurso = null;
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
            $con = Propel::getConnection(PermissaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PermissaoQuery::create()
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
            $con = Propel::getConnection(PermissaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PermissaoPeer::addInstanceToPool($this);
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

            if ($this->aPerfil !== null) {
                if ($this->aPerfil->isModified() || $this->aPerfil->isNew()) {
                    $affectedRows += $this->aPerfil->save($con);
                }
                $this->setPerfil($this->aPerfil);
            }

            if ($this->aRecurso !== null) {
                if ($this->aRecurso->isModified() || $this->aRecurso->isNew()) {
                    $affectedRows += $this->aRecurso->save($con);
                }
                $this->setRecurso($this->aRecurso);
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
        if ($this->isColumnModified(PermissaoPeer::CO_PERFIL)) {
            $modifiedColumns[':p' . $index++]  = 'co_perfil';
        }
        if ($this->isColumnModified(PermissaoPeer::DT_ALTERACAO)) {
            $modifiedColumns[':p' . $index++]  = 'dt_alteracao';
        }
        if ($this->isColumnModified(PermissaoPeer::CO_USUARIO_ALTERACAO)) {
            $modifiedColumns[':p' . $index++]  = 'co_usuario_alteracao';
        }
        if ($this->isColumnModified(PermissaoPeer::CO_RECURSO)) {
            $modifiedColumns[':p' . $index++]  = 'co_recurso';
        }
        if ($this->isColumnModified(PermissaoPeer::ST_PERMISSAO)) {
            $modifiedColumns[':p' . $index++]  = 'st_permissao';
        }
        if ($this->isColumnModified(PermissaoPeer::DT_CADASTRO)) {
            $modifiedColumns[':p' . $index++]  = 'dt_cadastro';
        }
        if ($this->isColumnModified(PermissaoPeer::CO_USUARIO_CADASTRO)) {
            $modifiedColumns[':p' . $index++]  = 'co_usuario_cadastro';
        }

        $sql = sprintf(
            'INSERT INTO permissao (%s) VALUES (%s)',
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
                    case 'dt_alteracao':
                        $stmt->bindValue($identifier, $this->dt_alteracao, PDO::PARAM_STR);
                        break;
                    case 'co_usuario_alteracao':
                        $stmt->bindValue($identifier, $this->co_usuario_alteracao, PDO::PARAM_INT);
                        break;
                    case 'co_recurso':
                        $stmt->bindValue($identifier, $this->co_recurso, PDO::PARAM_INT);
                        break;
                    case 'st_permissao':
                        $stmt->bindValue($identifier, $this->st_permissao, PDO::PARAM_BOOL);
                        break;
                    case 'dt_cadastro':
                        $stmt->bindValue($identifier, $this->dt_cadastro, PDO::PARAM_STR);
                        break;
                    case 'co_usuario_cadastro':
                        $stmt->bindValue($identifier, $this->co_usuario_cadastro, PDO::PARAM_INT);
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

            if ($this->aPerfil !== null) {
                if (!$this->aPerfil->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPerfil->getValidationFailures());
                }
            }

            if ($this->aRecurso !== null) {
                if (!$this->aRecurso->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRecurso->getValidationFailures());
                }
            }


            if (($retval = PermissaoPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = PermissaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDtAlteracao();
                break;
            case 2:
                return $this->getCoUsuarioAlteracao();
                break;
            case 3:
                return $this->getCoRecurso();
                break;
            case 4:
                return $this->getStPermissao();
                break;
            case 5:
                return $this->getDtCadastro();
                break;
            case 6:
                return $this->getCoUsuarioCadastro();
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
        if (isset($alreadyDumpedObjects['Permissao'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Permissao'][serialize($this->getPrimaryKey())] = true;
        $keys = PermissaoPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCoPerfil(),
            $keys[1] => $this->getDtAlteracao(),
            $keys[2] => $this->getCoUsuarioAlteracao(),
            $keys[3] => $this->getCoRecurso(),
            $keys[4] => $this->getStPermissao(),
            $keys[5] => $this->getDtCadastro(),
            $keys[6] => $this->getCoUsuarioCadastro(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPerfil) {
                $result['Perfil'] = $this->aPerfil->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aRecurso) {
                $result['Recurso'] = $this->aRecurso->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = PermissaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDtAlteracao($value);
                break;
            case 2:
                $this->setCoUsuarioAlteracao($value);
                break;
            case 3:
                $this->setCoRecurso($value);
                break;
            case 4:
                $this->setStPermissao($value);
                break;
            case 5:
                $this->setDtCadastro($value);
                break;
            case 6:
                $this->setCoUsuarioCadastro($value);
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
        $keys = PermissaoPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setCoPerfil($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDtAlteracao($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCoUsuarioAlteracao($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setCoRecurso($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setStPermissao($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDtCadastro($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCoUsuarioCadastro($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PermissaoPeer::DATABASE_NAME);

        if ($this->isColumnModified(PermissaoPeer::CO_PERFIL)) $criteria->add(PermissaoPeer::CO_PERFIL, $this->co_perfil);
        if ($this->isColumnModified(PermissaoPeer::DT_ALTERACAO)) $criteria->add(PermissaoPeer::DT_ALTERACAO, $this->dt_alteracao);
        if ($this->isColumnModified(PermissaoPeer::CO_USUARIO_ALTERACAO)) $criteria->add(PermissaoPeer::CO_USUARIO_ALTERACAO, $this->co_usuario_alteracao);
        if ($this->isColumnModified(PermissaoPeer::CO_RECURSO)) $criteria->add(PermissaoPeer::CO_RECURSO, $this->co_recurso);
        if ($this->isColumnModified(PermissaoPeer::ST_PERMISSAO)) $criteria->add(PermissaoPeer::ST_PERMISSAO, $this->st_permissao);
        if ($this->isColumnModified(PermissaoPeer::DT_CADASTRO)) $criteria->add(PermissaoPeer::DT_CADASTRO, $this->dt_cadastro);
        if ($this->isColumnModified(PermissaoPeer::CO_USUARIO_CADASTRO)) $criteria->add(PermissaoPeer::CO_USUARIO_CADASTRO, $this->co_usuario_cadastro);

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
        $criteria = new Criteria(PermissaoPeer::DATABASE_NAME);
        $criteria->add(PermissaoPeer::CO_PERFIL, $this->co_perfil);
        $criteria->add(PermissaoPeer::CO_RECURSO, $this->co_recurso);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getCoPerfil();
        $pks[1] = $this->getCoRecurso();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setCoPerfil($keys[0]);
        $this->setCoRecurso($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getCoPerfil()) && (null === $this->getCoRecurso());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Permissao (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCoPerfil($this->getCoPerfil());
        $copyObj->setDtAlteracao($this->getDtAlteracao());
        $copyObj->setCoUsuarioAlteracao($this->getCoUsuarioAlteracao());
        $copyObj->setCoRecurso($this->getCoRecurso());
        $copyObj->setStPermissao($this->getStPermissao());
        $copyObj->setDtCadastro($this->getDtCadastro());
        $copyObj->setCoUsuarioCadastro($this->getCoUsuarioCadastro());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return Permissao Clone of current object.
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
     * @return PermissaoPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PermissaoPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Perfil object.
     *
     * @param             Perfil $v
     * @return Permissao The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPerfil(Perfil $v = null)
    {
        if ($v === null) {
            $this->setCoPerfil(NULL);
        } else {
            $this->setCoPerfil($v->getCoPerfil());
        }

        $this->aPerfil = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Perfil object, it will not be re-added.
        if ($v !== null) {
            $v->addPermissao($this);
        }


        return $this;
    }


    /**
     * Get the associated Perfil object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Perfil The associated Perfil object.
     * @throws PropelException
     */
    public function getPerfil(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPerfil === null && ($this->co_perfil !== null) && $doQuery) {
            $this->aPerfil = PerfilQuery::create()->findPk($this->co_perfil, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPerfil->addPermissaos($this);
             */
        }

        return $this->aPerfil;
    }

    /**
     * Declares an association between this object and a Recurso object.
     *
     * @param             Recurso $v
     * @return Permissao The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRecurso(Recurso $v = null)
    {
        if ($v === null) {
            $this->setCoRecurso(NULL);
        } else {
            $this->setCoRecurso($v->getCoRecurso());
        }

        $this->aRecurso = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Recurso object, it will not be re-added.
        if ($v !== null) {
            $v->addPermissao($this);
        }


        return $this;
    }


    /**
     * Get the associated Recurso object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Recurso The associated Recurso object.
     * @throws PropelException
     */
    public function getRecurso(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRecurso === null && ($this->co_recurso !== null) && $doQuery) {
            $this->aRecurso = RecursoQuery::create()->findPk($this->co_recurso, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRecurso->addPermissaos($this);
             */
        }

        return $this->aRecurso;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->co_perfil = null;
        $this->dt_alteracao = null;
        $this->co_usuario_alteracao = null;
        $this->co_recurso = null;
        $this->st_permissao = null;
        $this->dt_cadastro = null;
        $this->co_usuario_cadastro = null;
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
            if ($this->aPerfil instanceof Persistent) {
              $this->aPerfil->clearAllReferences($deep);
            }
            if ($this->aRecurso instanceof Persistent) {
              $this->aRecurso->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aPerfil = null;
        $this->aRecurso = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PermissaoPeer::DEFAULT_STRING_FORMAT);
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
