<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ventas Controller
 *
 * @property \App\Model\Table\VentasTable $Ventas
 * @method \App\Model\Entity\Venta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VentasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ejemplars'],
        ];
        $ventas = $this->paginate($this->Ventas);

        $this->set(compact('ventas'));
    }

    /**
     * View method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venta = $this->Ventas->get($id, [
            'contain' => ['Ejemplars'],
        ]);

        $this->set(compact('venta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venta = $this->Ventas->newEmptyEntity();
        if ($this->request->is('post')) {
            $venta = $this->Ventas->patchEntity($venta, $this->request->getData());
            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('The venta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venta could not be saved. Please, try again.'));
        }
        $ejemplars = $this->Ventas->Ejemplars->find('list', ['limit' => 200])->all();
        $this->set(compact('venta', 'ejemplars'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venta = $this->Ventas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venta = $this->Ventas->patchEntity($venta, $this->request->getData());
            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('The venta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venta could not be saved. Please, try again.'));
        }
        $ejemplars = $this->Ventas->Ejemplars->find('list', ['limit' => 200])->all();
        $this->set(compact('venta', 'ejemplars'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venta = $this->Ventas->get($id);
        if ($this->Ventas->delete($venta)) {
            $this->Flash->success(__('The venta has been deleted.'));
        } else {
            $this->Flash->error(__('The venta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
