<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ejemplars Model
 *
 * @property \App\Model\Table\LibrosTable&\Cake\ORM\Association\BelongsTo $Libros
 *
 * @method \App\Model\Entity\Ejemplar newEmptyEntity()
 * @method \App\Model\Entity\Ejemplar newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ejemplar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ejemplar get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ejemplar findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ejemplar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ejemplar[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ejemplar|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ejemplar saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ejemplar[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ejemplar[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ejemplar[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ejemplar[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EjemplarsTable extends Table
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

        $this->setTable('ejemplars');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Libros', [
            'foreignKey' => 'libro_id',
            'joinType' => 'INNER',
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
            ->scalar('isbn')
            ->maxLength('isbn', 20)
            ->allowEmptyString('isbn')
            ->add('isbn', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('editorial')
            ->maxLength('editorial', 100)
            ->allowEmptyString('editorial');

        $validator
            ->integer('cantidad')
            ->allowEmptyString('cantidad');

        $validator
            ->integer('libro_id')
            ->notEmptyString('libro_id');

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
        $rules->add($rules->isUnique(['isbn'], ['allowMultipleNulls' => true]), ['errorField' => 'isbn']);
        $rules->add($rules->existsIn('libro_id', 'Libros'), ['errorField' => 'libro_id']);

        return $rules;
    }
}
