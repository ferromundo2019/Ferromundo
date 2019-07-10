<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Brands Model
 *
 * @property \App\Model\Table\ArticlesTable|\Cake\ORM\Association\HasMany $Articles
 *
 * @method \App\Model\Entity\Brand get($primaryKey, $options = [])
 * @method \App\Model\Entity\Brand newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Brand[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Brand|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Brand saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Brand patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Brand[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Brand findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BrandsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('brands');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Articles', [
            'foreignKey' => 'brand_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            //->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            //->allowEmptyString('name', false);

            ->notEmpty('name', 'A name is required');

        return $validator;
    }
}
