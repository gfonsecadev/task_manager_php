function editar(tarefa,id,pagina){

				let divTarefa=document.getElementById('tarefa_'+id);
				divTarefa.innerHTML='';
				let form=document.createElement('form');
				form.action=`${caminhoCorreto(pagina)}response.php?acao=atualizar`;
				form.method='post';
				form.className='row'

				let input=document.createElement('input');
				input.type='text';
				input.name='tarefaAtualizada';
				input.className='col-9 form-control'
				input.value=tarefa;

				let input2=document.createElement('input');
				input2.type='hidden';
				input2.name='id';
				input2.value=id;

				let input3=document.createElement('input');
				input3.type='hidden';
				input3.name='pagina';
				input3.value=pagina;

				let botao=document.createElement('button');
				botao.type='submit';
				botao.className='col-3 btn btn-danger';
				botao.innerHTML='Alterar';

				form.appendChild(input);
				form.appendChild(input2);
				form.appendChild(input3);
				form.appendChild(botao);


				divTarefa.insertBefore(form,divTarefa[0])

			}

			function remover(id,pagina){
				window.location.href=`${caminhoCorreto(pagina)}response.php?acao=remover&id=${id}&pagina=${pagina}`;
			}

			function marcarCumprida(id,pagina){
				window.location.href=`${caminhoCorreto(pagina)}response.php?acao=marcarCumprida&id=${id}&pagina=${pagina}`;
			}

			function caminhoCorreto(caminho){
				if(caminho=="index"){
					return "scripts/"
				}else{
					return ""
				}
			}