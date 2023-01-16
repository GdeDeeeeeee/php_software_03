<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ejemplars Controller
 *
 * @property \App\Model\Table\EjemplarsTable $Ejemplars
 * @method \App\Model\Entity\Ejemplar[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EjemplarsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Libros'],
        ];
        $ejemplars = $this->paginate($this->Ejemplars);

        $this->set(compact('ejemplars'));
    }

    /**
     * View method
     *
     * @param string|null $id Ejemplar id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ejemplar = $this->Ejemplars->get($id, [
            'contain' => ['Libros'],
        ]);

        $this->set(compact('ejemplar'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ejemplar = $this->Ejemplars->newEmptyEntity();
        if ($this->request->is('post')) {
            $ejemplar = $this->Ejemplars->patchEntity($ejemplar, $this->request->getData());
            if ($this->Ejemplars->save($ejemplar)) {
                $this->Flash->success(__('The ejemplar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ejemplar could not be saved. Please, try again.'));
        }
        // $libros = $this->Ejemplars->Libros->find('list', ['limit' => 200])->all();
        $consulta = $this->Ejemplars->Libros->find()
        ->innerJoinWith('Autors')
        ->select([
            'Titulo'=>'Libros.titulo',
            'Autor'=>'Autors.nombre',
            'Pais'=>'Autors.pais']
           
            )
        ->order(['Titulo' => 'ASC']);
        // Arreglo con los campos concatenados
        $libros = $consulta->find('list',
        ['keyfield' => 'id',
        'valueField' =>
        function ($row)
        {
        return
        $row['Titulo'].' - '.
        $row['Autor'] . ' (' . 
        $row['Pais']. ')';
        }
        ]
        )->toArray();
        $this->set(compact('ejemplar', 'libros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ejemplar id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ejemplar = $this->Ejemplars->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ejemplar = $this->Ejemplars->patchEntity($ejemplar, $this->request->getData());
            if ($this->Ejemplars->save($ejemplar)) {
                $this->Flash->success(__('The ejemplar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ejemplar could not be saved. Please, try again.'));
        }
        // $libros = $this->Ejemplars->Libros->find('list', ['limit' => 200])->all();
        $consulta = $this->Ejemplars->Libros->find()
        ->innerJoinWith('Autors')
        ->select([
            'Titulo'=>'Libros.titulo',
            'Autor'=>'Autors.nombre',
            'Pais'=>'Autors.pais']
           
            )
        ->order(['Titulo' => 'ASC']);
        // Arreglo con los campos concatenados
        $libros = $consulta->find('list',
        ['keyfield' => 'id',
        'valueField' =>
        function ($row)
        {
        return
        $row['Titulo'].' - '.
        $row['Autor'] . ' (' . 
        $row['Pais']. ')';
        }
        ]
        )->toArray();
        $this->set(compact('ejemplar', 'libros'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ejemplar id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ejemplar = $this->Ejemplars->get($id);
        if ($this->Ejemplars->delete($ejemplar)) {
            $this->Flash->success(__('The ejemplar has been deleted.'));
        } else {
            $this->Flash->error(__('The ejemplar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
