<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Libros Model
 *
 * @property \App\Model\Table\AutorsTable&\Cake\ORM\Association\BelongsTo $Autors
 *
 * @method \App\Model\Entity\Libro newEmptyEntity()
 * @method \App\Model\Entity\Libro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Libro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Libro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Libro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Libro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Libro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Libro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Libro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Libro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Libro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Libro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Libro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LibrosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('libros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Autors', [
            'foreignKey' => 'autor_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Ejemplars', [
            'foreignKey' => 'libro_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 200)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo')
            ->add('titulo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('resumen')
            ->allowEmptyString('resumen');

        $validator
            ->integer('autor_id')
            ->notEmptyString('autor_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['titulo']), ['errorField' => 'titulo']);
        $rules->add($rules->existsIn('autor_id', 'Autors'), ['errorField' => 'autor_id']);

        return $rules;
    }
}
