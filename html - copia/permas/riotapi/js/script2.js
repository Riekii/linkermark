

function traer() {

	var nickname = document.getElementById("nickname").value
	var region = document.getElementById("region").value


	fetch('https://' + region + '.api.riotgames.com/lol/summoner/v4/summoners/by-name/' + nickname + '?api_key=RGAPI-6bec3e19-89e1-4b07-9264-20e61c1a670b')
		.then(res => res.json())
		.then(data => {

			var contenido = document.querySelector('#contenido')
			console.log(data)
			contenido.innerHTML = `
	 <img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/profileicon/${data.profileIconId}.png" width="100px" class="img-fluid rounded-circle">
     <p>Nombre: ${data.name} </p>
     <p>Nivel : ${data.summonerLevel} </p>`

			var accountId = data.accountId

			fetch('https://' + region + '.api.riotgames.com/lol/match/v4/matchlists/by-account/' + accountId + '?api_key=RGAPI-6bec3e19-89e1-4b07-9264-20e61c1a670b')
				.then(res => res.json())
				.then(data => {

					var contenido = document.querySelector('#partidas')
					console.log(data)

					tabla(data.matches)

				})

		})



	function tabla(datos) {
		console.log(datos)
		var partidas = document.querySelector('#partidas')
		partidas.innerHTML = ``
		for (var i = 0; i <= 10; i++) {
			console.log(datos[i])

			var gameId = datos[i].gameId
			console.log(gameId)


			fetch('https://' + region + '.api.riotgames.com/lol/match/v4/matches/' + gameId + '?api_key=RGAPI-6bec3e19-89e1-4b07-9264-20e61c1a670b')
				.then(res => res.json())
				.then(data => {


					fetch('json/champion.json')
						.then(res => res.json())
						.then(champs => {
							console.log(champs);

							for (var key in champs.data) {
								if (champs.data[key].key == data.participants['0'].championId) {
									var nombre = champs.data[key].id
									console.log(nombre)
									var image = champs.data[key].image.full
									console.log(image)

									partidas.innerHTML += `
													  <tr>
										              	<td><img src="http://ddragon.leagueoflegends.com/cdn/6.24.1/img/champion/${image}" width="75px" class="img-fluid" ></td>
										              	<td>${data.participants['0'].stats.kills}/${data.participants['0'].stats.deaths}/${data.participants['0'].stats.assists}</td>
										              	<td>
															${data.participants['0'].stats.item0},
												            ${data.participants['0'].stats.item1},
												            ${data.participants['0'].stats.item2},
															${data.participants['0'].stats.item3},
												            ${data.participants['0'].stats.item4},
												            ${data.participants['0'].stats.item5},
												            ${data.participants['0'].stats.item6}
										              	</td>
										              </tr>`
								}
							}
						})


				})



		}

		document.getElementById('tablaPartidas').style.display = 'inline'

	}

}

/* ──► PARA HACER ◄──  
			>>>> BUSCAR EN EL JSON DE ITEMS CON UN ACUMULADOR EL NUMERO IDENTIFICATIVO DE CADA ITEM <<<<

					let obj = [data.participants['0'].stats.item0, 
					data.participants['0'].stats.item1, 
					data.participants['0'].stats.item3, 
					data.participants['0'].stats.item4, 
					data.participants['0'].stats.item5, 
					data.participants['0'].stats.item6];

					fetch('json/item.json')
					.then(res => res.json())
					.then(items => {
						for (var into in items.data) {
							if (items.data[into].into == data.participants['0'].item0) {
								var sprite = items.data[into].image.full
								console.log(sprite)
							}

						}
					}) */