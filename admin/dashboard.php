<?php
ob_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/utils/function.php");
$reports = query("SELECT * FROM reports");
$totalLaporanMasuk = query("SELECT COUNT(*) as total FROM reports");
$totalLaporanSelesai = query("SELECT COUNT(*) as total FROM reports WHERE status=1");
$totalLaporanGagal = query("SELECT COUNT(*) as total FROM reports WHERE status=0");
?>

<!DOCTYPE html>
<html lang="en">
<html x-data="data()" lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
		rel="stylesheet" />
	<!-- Favicon -->
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>

<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
	<aside class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-60">
		<div class="flex flex-col justify-between h-full">
			<div class="flex-grow">
				<div class="px-4 py-6 text-center border-b">
					<h1 class="text-xl font-bold leading-none"><span class="text-[#608BC1]">Dashboard</span> Laporan</h1>
				</div>
				<div class="p-4">
					<ul class="space-y-1">
						<li>
							<a href="javascript:void(0)" class="flex items-center text-center bg-[#0D92F4] rounded-xl font-bold text-sm text-white py-3 px-4">
								<svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-5h7.586l-.293.293a1 1 0 0 0 1.414 1.414l2-2a1 1 0 0 0 0-1.414l-2-2a1 1 0 0 0-1.414 1.414l.293.293H4V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
								</svg> laporan masuk
							</a>
						</li>
						<!-- laporan selesai -->
						<li>
							<a href="javascript:void(0)" class="flex bg-white hover:bg-[#0D92F4] hover:text-white rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
								<svg class="w-6 h-6 text-gray-800  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z" />
									<path fill-rule="evenodd" d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm4.707 5.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd" />
								</svg>laporan selesai
							</a>
						</li>
						<!-- list laporan -->
						<li class="hover:text-white">
							<a href="javascript:void(0)" class="flex bg-white hover:text-white hover:bg-[#0D92F4] hover:text-white rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
								<svg class="w-6 h-6 text-gray-800  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
								</svg>List laporan
							</a>
						</li>
						<!-- user -->
						<li>
							<a href="javascript:void(0)" class="flex bg-white hover:bg-[#0D92F4]  hover:text-white rounded-xl font-bold text-sm hover py-3 px-4">
								<svg class="w-6 h-6 text-gray-800 hover:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd" />
								</svg>
								User
							</a>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</aside>
	<div class="flex flex-col flex-1 w-full overflow-y-auto">
		<main class="">
			<div class="grid mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100 border-4>

                    <div class=" grid grid-cols-12 gap-6">
				<div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
					<div class="col-span-12 mt-8">
						<div class="flex items-center h-10 intro-y">
							<h2 class="mr-5 text-lg font-medium truncate">Dashboard laporan warga</h2>
						</div>
						<div class="grid grid-cols-12 gap-6 mt-5">
							<a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
								href="#">
								<div class="p-5">
									<div class="ml-2 w-full flex-1">
										<div>
											<div class="mt-3 text-3xl font-bold leading-8"><?php echo $totalLaporanMasuk[0]['total'] ?></div>

											<div class="mt-1 text-base text-gray-600">Laporan Masuk</div>
										</div>
									</div>
								</div>
							</a>
							<a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
								href="#">
								<div class="p-5">
									<div class="ml-2 w-full flex-1">
										<div>
											<div class="mt-3 text-3xl font-bold leading-8"><?php echo $totalLaporanSelesai[0]['total'] ?></div>

											<div class="mt-1 text-base text-gray-600">Laporan Selesai</div>
										</div>
									</div>
								</div>
							</a>
							<a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
								href="#">
								<div class="p-5">
									<div class="ml-2 w-full flex-1">
										<div>
											<div class="mt-3 text-3xl font-bold leading-8"><?php echo $totalLaporanGagal[0]['total'] ?></div>

											<div class="mt-1 text-base text-gray-600">Laporan di proses</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>

					<div class="col-span-12 mt-5">
						<div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
							<div class="bg-white p-4 shadow-lg rounded-lg">
								<h1 class="font-bold text-base">List Laporan Warga</h1>
								<div class="mt-4">
									<div class="flex flex-col">
										<div class="-my-2 overflow-x-auto">
											<div class="py-2 align-middle inline-block min-w-full">
												<div
													class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
													<table class="min-w-full divide-y divide-gray-200">
														<thead>
															<tr>
																<th
																	class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
																	<div class="flex cursor-pointer">
																		<span class="mr-2">title</span>
																	</div>
																</th>
																<th
																	class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
																	<div class="flex cursor-pointer">
																		<span class="mr-2">content</span>
																	</div>
																</th>
																<th
																	class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
																	<div class="flex cursor-pointer">
																		<span class="mr-2">thumbnail</span>
																	</div>
																</th>
																<th
																	class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
																	<div class="flex cursor-pointer">
																		<span class="mr-2">status</span>
																	</div>
																</th>
															</tr>
														</thead>
														<tbody class="bg-white divide-y divide-gray-200">
															<?php
															foreach ($reports as $report) :
															?>
																<tr>
																	<td
																		class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
																		<p><?php echo $report['title'] ?></p>
																		<p class="text-xs text-gray-400"> Laporan Warga
																		</p>
																	</td>
																	<td
																		class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
																		<p><?php echo $report['content'] ?></p>
																	</td>
																	<td
																		class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
																		<p><?php echo $report['thumbnail'] ?></p>

																	</td>
																	<td
																		class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
																		<div class="flex space-x-4">
																			<a href="#" class="text-blue-500 hover:text-blue-600">
																				<svg xmlns="http://www.w3.org/2000/svg"
																					class="w-5 h-5 mr-1"
																					fill="none" viewBox="0 0 24 24"
																					stroke="currentColor">
																					<path stroke-linecap="round"
																						stroke-linejoin="round"
																						stroke-width="2"
																						d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
																				</svg>
																				<p>Edit</p>
																			</a>
																			<a href="#">

																				<div class="flex <?= $report['status'] == 1 ? 'text-green-500' : 'text-yellow-500' ?>">
																					<?php
																					if ($report['status'] == 1) : ?>

																						<svg xmlns="http://www.w3.org/2000/svg"
																							class="w-6 h-6" fill="none"
																							viewBox="0 0 24 24"
																							stroke="currentColor">
																							<path stroke-linecap="round"
																								stroke-linejoin="round"
																								stroke-width="2"
																								d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
																						</svg>
																					<?php else: ?>
																						<svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
																							<path d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
																							<path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
																						</svg>
																					<?php endif ?>
																					<p><?= $report['status'] == 1 ? 'Laporan Selesai' : 'Laporan di proses' ?></p>
																				</div>
																				<a href="dashboard.php?id=<?= $report['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
																					<svg class="w-6 h-6 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
																						<path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
																					</svg>

																				</a>

																			</a>
																		</div>
																	</td>
																</tr>
															<?php endforeach ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!-- delete -->
	<?php
	// Start output buffering at the top of the file
	ob_start();

	$conn = new mysqli('127.0.0.1', 'root', '', 'lapor_pak');

	if ($conn->connect_error) {
		die("Koneksi gagal: " . $conn->connect_error);
	}

	if (isset($_GET['id'])) {
		$id = intval($_GET['id']);

		$sql = "DELETE FROM reports WHERE id = ?";
		$stmt = $conn->prepare($sql);

		if ($stmt) {
			$stmt->bind_param('i', $id);

			if ($stmt->execute()) {
				echo "Data berhasil dihapus!";
				header("Location: index.php?page=dashboard");
				exit;
			} else {
				echo "Terjadi kesalahan: " . $stmt->error;
			}

			$stmt->close();
		} else {
			echo "Terjadi kesalahan: " . $conn->error;
		}
	}

	$conn->close();

	// End output buffering and clean any output if necessary
	ob_end_flush();
	?>


	<!-- end delete -->
	<script>
		function data() {

			return {

				isSideMenuOpen: false,
				toggleSideMenu() {
					this.isSideMenuOpen = !this.isSideMenuOpen
				},
				closeSideMenu() {
					this.isSideMenuOpen = false
				},
				isNotificationsMenuOpen: false,
				toggleNotificationsMenu() {
					this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
				},
				closeNotificationsMenu() {
					this.isNotificationsMenuOpen = false
				},
				isProfileMenuOpen: false,
				toggleProfileMenu() {
					this.isProfileMenuOpen = !this.isProfileMenuOpen
				},
				closeProfileMenu() {
					this.isProfileMenuOpen = false
				},
				isPagesMenuOpen: false,
				togglePagesMenu() {
					this.isPagesMenuOpen = !this.isPagesMenuOpen
				},

			}
		}
	</script>
	<script>
		var chart = document.querySelector('#chartline')
		var options = {
			series: [{
				name: 'TEAM A',
				type: 'area',
				data: [44, 55, 31, 47, 31, 43, 26, 41, 31, 47, 33]
			}, {
				name: 'TEAM B',
				type: 'line',
				data: [55, 69, 45, 61, 43, 54, 37, 52, 44, 61, 43]
			}],
			chart: {
				height: 350,
				type: 'line',
				zoom: {
					enabled: false
				}
			},
			stroke: {
				curve: 'smooth'
			},
			fill: {
				type: 'solid',
				opacity: [0.35, 1],
			},
			labels: ['Dec 01', 'Dec 02', 'Dec 03', 'Dec 04', 'Dec 05', 'Dec 06', 'Dec 07', 'Dec 08', 'Dec 09 ',
				'Dec 10', 'Dec 11'
			],
			markers: {
				size: 0
			},
			yaxis: [{
					title: {
						text: 'Series A',
					},
				},
				{
					opposite: true,
					title: {
						text: 'Series B',
					},
				},
			],
			tooltip: {
				shared: true,
				intersect: false,
				y: {
					formatter: function(y) {
						if (typeof y !== "undefined") {
							return y.toFixed(0) + " points";
						}
						return y;
					}
				}
			}
		};
		var chart = new ApexCharts(chart, options);
		chart.render();
	</script>
	<script>
		var chart = document.querySelector('#chartpie')
		var options = {
			series: [44, 55, 67, 83],
			chart: {
				height: 350,
				type: 'radialBar',
			},
			plotOptions: {
				radialBar: {
					dataLabels: {
						name: {
							fontSize: '22px',
						},
						value: {
							fontSize: '16px',
						},
						total: {
							show: true,
							label: 'Total',
							formatter: function(w) {
								// By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
								return 249
							}
						}
					}
				}
			},
			labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
		};
		var chart = new ApexCharts(chart, options);
		chart.render();
	</script>

</body>

</html>