   <tr class="d-flex">
       <td class="col-6 fs-3 ms-3 text-break">
           {{title}}
       </td>
       <td class="col-6">
           {{actionsButton}}
       </td>
   </tr>

   <div class="modal fade bd-example-modal-sm" id="modalDescript">
       <div class="modal-dialog modal-sm">
           <div class="modal-header">
               <h2 class="modal-title">Descrição {{title}}</h2>
               <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
           </div>

           <div class="modal-body">
               {{descript}}
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
           </div>
       </div>
   </div>