<!DOCTYPE html>
<html lang="en">
<?php echo view("admin/head"); ?>
<body style="display: none">
    <div class="layout">
        <?php echo view("admin/nav"); ?>
        <div class="wrapper">
            <?php echo view("admin/header"); ?>
            <main class="main">
                <div class="p-md lg:p-lg main__full">
                    <div data-script="email" class="cols card h-full">
                        <!-- BEGIN: Main Content -->
                        <div class="cols__main">
                            <div class="flex flex-col h-full">
                                <!-- BEGIN: Mail Filter & Control -->
                                <div class="card__header relative z-10 flex-col gap-y-5 items-stretch gap-x-5 border-b py-3">
                                    <div class="flex items-center gap-x-5 pt-1.5">
                                        <button data-col-show="emailSidebar" class="lg:hidden button button--flat button--icon">
                                            <i data-icon="feather__menu"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- END: Mail Filter & Control -->
                                <!-- BEGIN: Inbox List -->
                                <div id="messageList" class="flex-1 flex flex-col h-0 scrollbar" data-scrollbar>
								<div class="col__inner flex flex-col h-full border-r bg-gray-50">
                                <div class="card__header py-3 border-b">
                                    <div class="w-full flex flex-wrap items-center gap-x-5">
                                        <a href="<?php echo site_url()."backoffice/ticket";?>" class="editor__toolbar__item button button--icon button--flat">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="icon icon--feather"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                        </a>
                                        <div class="flex-1 text-lg font-semibold">
											<?php echo $obj_ticket[0]->title;?>&nbsp;&nbsp;
											<?php 
											if($obj_ticket[0]->status == 1){ ?>
													<span class="badge scheme-yellow">En Proceso</span>
											<?php }else{ ?>
													<span class="badge scheme-green">Terminado</span>
											<?php } ?>
                                        </div>
                                    </div>
                                </div>

								<div class="card__body">
                                        <div class="flex flex-wrap xs:flex-nowrap items-center gap-5">
                                            <div class="flex-1 flex flex-col">
                                            </div>
                                            <div class="order-first xs:order-none w-full xs:w-auto flex flex-col sm:flex-row items-end sm:items-center">
                                                <span class="text-sm text-gray-400"><?php echo formato_fecha_dia_mes_anio_abrev($obj_ticket[0]->date);?></span>
                                            </div>
                                        </div>
                                        <div class="bg-white rounded shadow ml-16 mt-3">
                                            <div class="p-md lg:px-lg">
                                                <p><?php echo $obj_ticket[0]->content;?></p>
                                            </div>
                                            <div class="self-end max-w-[100%] flex flex-col items-end gap-y-1">
                                                <div class="relative ml-10 py-4 px-5 bg-primary-500 shadow rounded">
                                                    <p class="text-white"><?php echo $obj_ticket[0]->respose;?></p>
                                                </div>
                                                <span class="text-sm text-gray-400">Soporte</span>
                                            </div>
											<?php
											if($obj_ticket[0]->img != ""){ ?>
												<div class="py-md px-lg border-t">
													<div class="grid md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3 gap-5">
														<a href="<?php echo site_url()."ticket/".$obj_ticket[0]->id."/".$obj_ticket[0]->img;?>" class="flex items-center gap-x-3" download="Comprobante">
															<span class="avatar">
																<span class="avatar__object bg-sky-200 rounded">IMAGEN</span>
															</span>
															<span class="w-0 flex-1 gap-y-1">
																<span class="block line-clamp-2 break-words font-semibold"><?php echo $obj_ticket[0]->img;?></span>
															</span>
														</a>
													</div>
												</div>
											<?php } ?>
                                        </div>
                                    </div>
                            	</div>
                            </div>
                                <!-- END: Inbox List -->
                            </div>
                        </div>
                        <!-- END: Main Content -->
                    </div>
                </div>
            </main>
            <footer>
            <script src='<?php echo site_url().'assets/backoffice/js/profile_new.js';?>'></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            </footer>
        </div>
        <!-- END: Wrapper Main -->
    </div>
    <!--END: Root Layout -->
</body>

</html>