<template>
    <div>
        <h4>Formulario</h4>

        <div class="vx-col w-full mb-base">
            <vx-card >
                <vs-alert active="true" color="warning" style="text-align: justify;" class="mb-3">
                    LO DISPUESTO EN LA LEY N°19.886 EN EL ARTÍCULO 8 LETRA G) Y EN EL ARTÍCULO 10, N° 7, LETRA F) 
                    "CUANDO POR LA MAGNITUD E IMPORTANCIA QUE IMPLICA LA CONTRATACIÓN SE HACE INDISPENSABLE RECURRIR 
                    A UN PROVEEDOR DETERMINADO EN RAZÓN DE LA CONFIANZA Y SEGURIDAD QUE SE DERIVAN DE SU EXPERIENCIA 
                    COMPROBADA EN LA PROVISIÓN DE LOS BIENES O SERVICIOS REQUERIDOS, Y SIEMPRE QUE SE ESTIME FUNDADAMENTE 
                    QUE NO EXISTEN OTROS PROVEEDORES QUE OTORGUEN ESA SEGURIDAD Y CONFIANZA".
                </vs-alert>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Interno" v-model="form.numero_interno"  />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Fecha Solicitud" type="date"
                                    v-model="form.fecha_solicitud" :value="form.fecha_solicitud" />
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Correlativo del Contrato" 
                                    v-model="form.correlativo_contrato"  />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Correlativo Cargo" 
                                    v-model="form.correlativo_cargo" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Reemp. cargo anterior" 
                                    v-model="form.reemplazo_cargo_anterior" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Renuncia" v-model="form.numero_renuncia" />
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="2" class="p-4 sm:p-2">
                        <vs-checkbox v-model="form.nueva_contratacion" >Nueva Contratación</vs-checkbox>
                    </vs-col>
                </vs-row>

            </vx-card>

            <vx-card class="mt-2">
                <vs-alert active="true" color="success" style="text-align: justify;" class="mb-3">
                    LA PRESENTE SOLICITUD DE SERVICIO, DEBE SER TRAMITADA ANTES DEL INICIO DE LA PRESTACION
                </vs-alert>

                <vs-row>
                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Centro de Costo/Unidad" 
                                    name="Centro Costo Unidad" v-validate="'required'"
                                    v-model="form.centro_costo_unidad" />
                        <span class="text-danger text-sm" v-show="errors.has('Centro Costo Unidad')">{{ errors.first('Centro Costo Unidad') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Fecha" type="date" name="Fecha" 
                                    v-model="form.fecha" :value="form.fecha" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Fecha')">{{ errors.first('Fecha') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row class="mt-2">
                    <vs-col vs-type="flex" vs-justify="left" vs-align="left" vs-w="12" class="p-4 sm:p-2">
                        <h5>Antecedentes para la contratación</h5>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-align="left" vs-w="12" class="p-4 sm:p-2">
                        <h6>Tipo de servicios a contratar</h6>
                        <span class="text-danger text-sm" v-show="errors.has('Tipo de servicios a contratar')">{{ errors.first('Tipo de servicios a contratar') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="top" vs-w="3" class="p-4 sm:p-2">
                        <ul>
                            <li>
                                <vs-radio v-model="form.servicios_a_contratar" vs-value="medico_general"
                                          v-validate="'required'" name="Tipo de servicios a contratar"  >Médico General</vs-radio>
                            </li>
                            <li>
                                <vs-radio v-model="form.servicios_a_contratar" vs-value="medico_especialidad">Médico con Especialidad</vs-radio>
                            </li>
                        </ul>
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="top" vs-w="3" class="p-4 sm:p-2">
                        <ul>
                            <li>
                                <vs-radio v-model="form.servicios_a_contratar" vs-value="enfermeria">Enfermería</vs-radio>
                            </li>
                            <li>
                                <vs-radio v-model="form.servicios_a_contratar" vs-value="tecnico_enfermeria">Técnico en Enfermería</vs-radio>
                            </li>
                        </ul>
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="top" vs-w="3" class="p-4 sm:p-2">
                        <ul>
                            <li>
                                <vs-radio v-model="form.servicios_a_contratar" vs-value="profesional_no_clinico">Profesional no clínico</vs-radio>
                            </li>
                            <li>
                                <vs-radio v-model="form.servicios_a_contratar" vs-value="tecnico">Técnico</vs-radio>
                            </li>
                            <li>
                                <vs-radio v-model="form.servicios_a_contratar" vs-value="administrativo">Administrativo</vs-radio>
                            </li>
                            <li>
                                <vs-radio v-model="form.servicios_a_contratar" vs-value="aux_servicio">Auxiliar de Servicio</vs-radio>
                            </li>
                        </ul>
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="top" vs-w="3" class="p-4 sm:p-2">
                        <ul>
                            <li>
                                <vs-radio v-model="form.servicios_a_contratar" vs-value="otro">Otro</vs-radio>
                            </li>
                            <li class="mt-7">
                                <vs-input class="w-full" label-placeholder="Ingresar Otro" v-model="form.otro_servicio"
                                            v-if="form.servicios_a_contratar === 'otro'"  />
                            </li>
                        </ul>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="12" class="p-4 sm:p-2">
                        <vs-textarea counter="250" label="Justificación de la Contratación" maxlength="250" minlength="100"
                                     name="Justificación" v-validate="'required|min:100|max:250'"
                                         v-model="form.justificacion_contratacion" />
                        <span class="text-danger text-sm" v-show="errors.has('Justificación')">{{ errors.first('Justificación') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="4" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Nombre" name="Nombre" 
                                    v-model="form.nombre" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Nombre')">{{ errors.first('Nombre') }}</span>
                    </vs-col>
                    
                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Rut" name="Rut" 
                                    v-model="form.rut" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Rut')">{{ errors.first('Rut') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Nacionalidad" name="Nacionalidad" 
                                    v-model="form.nacionalidad" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Nacionalidad')">{{ errors.first('Nacionalidad') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Profesión" name="Profesión" 
                                    v-model="form.profesion" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Profesión')">{{ errors.first('Profesión') }}</span>
                    </vs-col>
                    
                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Especialidad" name="Especialidad" 
                                    v-model="form.especialidad" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Especialidad')">{{ errors.first('Especialidad') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Registro Superintendencia de Salud" name="N° Registro Superintendencia"
                                    v-model="form.numero_registro_superintendencia_de_salud" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('N° Registro Superintendencia')">{{ errors.first('N° Registro Superintendencia') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="4" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Domicilio" name="Domicilio" 
                                    v-model="form.domicilio" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Domicilio')">{{ errors.first('Domicilio') }}</span>
                    </vs-col>
                    
                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Comuna" name="Comuna" 
                                    v-model="form.comuna" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Comuna')">{{ errors.first('Comuna') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Email" name="Email" 
                                    v-model="form.email" v-validate="'required|email'" />
                        <span class="text-danger text-sm" v-show="errors.has('Email')">{{ errors.first('Email') }}</span>
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Fecha de inicio" name="Fecha de inicio" 
                                    v-model="form.fecha_inicio" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Fecha de inicio')">{{ errors.first('Fecha de inicio') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Vigencia en meses" name="Vigencia en meses" 
                                    v-model="form.vigencia_en_meses" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Vigencia en meses')">{{ errors.first('Vigencia en meses') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Horas al mes" name="N° Horas al mes" 
                                    v-model="form.numero_horas_al_mes" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('N° Horas al mes')">{{ errors.first('N° Horas al mes') }}</span>
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Turnos al mes" name="N° Turnos al mes" 
                                    v-model="form.numero_turnos_al_mes" />
                    </vs-col>

                    <vs-col vs-w="2" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="N° Horas y/o Turnos extras" name="N° Horas y/o Turnos extras"
                                    v-model="form.numero_horas_o_turnos_extras" />
                    </vs-col>
                </vs-row>

                <vs-row>
                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" icon-pack="feather" icon="icon-dollar-sign" icon-no-border 
                                    label-placeholder="Valor Hora/Prestación" name="Valor Hora/Prestación" 
                                    v-model="form.valor_hora_prestacion" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('N° Horas al mes')">{{ errors.first('N° Horas al mes') }}</span>
                    </vs-col>

                    <vs-col vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" icon-pack="feather" icon="icon-dollar-sign" icon-no-border 
                                    label-placeholder="Monto Máximo Contratación" name="Monto Máximo Contratación" 
                                    v-model="form.monto_maximo_contratacion" v-validate="'required'" />
                        <span class="text-danger text-sm" v-show="errors.has('Monto Máximo Contratación')">{{ errors.first('Monto Máximo Contratación') }}</span>
                    </vs-col>
                </vs-row>

            </vx-card>

            <vx-card class="mt-2" >
                <vs-alert active="true" color="warning" style="text-align: justify;" class="mb-3">
                    SOLICITA ADMINISTADOR DEL CONTRATO Y EN RAZÓN DE LA CONFIANZA Y SEGURIDAD QUE SE DERIVAN DE SU EXPERIENCIA COMPROBADA
                </vs-alert>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Cargo" v-model="form.cargo" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Correo" v-model="form.correo" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Anexos" v-model="form.anexos" />
                    </vs-col>
                </vs-row>
            </vx-card>

            <vx-card class="mt-2" >
                <vs-alert active="true" color="warning" style="text-align: justify;" class="mb-3">
                    AUTORIZAN DIRECTIVOS DEL HOSPITAL
                </vs-alert>

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Nombre"  />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Fecha Autoriza" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Sub Dirección" />
                    </vs-col>
                </vs-row>
                

                <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Nombre"  />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Fecha Autoriza" />
                    </vs-col>

                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="3" class="p-4 sm:p-2">
                        <vs-input class="w-full" label-placeholder="Sub Dirección" value="Administrativa" />
                    </vs-col>
                </vs-row>
            </vx-card>

            <vs-button type="filled" @click.prevent="submitForm" class="mt-5 block">Guardar</vs-button>
        </div>
    </div>
</template>

<script>

export default {
  data () {
    return {
        form: {
            // Primera parte
            numero_interno: '',
            fecha_solicitud: new Date().toISOString().slice(0,10),
            correlativo_contrato: '',
            correlativo_cargo: '',
            reemplazo_cargo_anterior: '',
            numero_renuncia: '',
            nueva_contratacion: false,
            // Segunda parte
            centro_costo_unidad: '',
            fecha:  new Date().toISOString().slice(0,10),
            servicios_a_contratar: '',
            otro_servicio: '',
            justificacion_contratacion: '',
            nombre: '',
            rut: '',
            nacionalidad: '',
            profesion: '',
            especialidad: '',
            numero_registro_superintendencia_de_salud: '',
            domicilio: '',
            comuna: '',
            email: '',
            fecha_inicio: '',
            vigencia_en_meses: '',
            numero_horas_al_mes: '',
            numero_turnos_al_mes: '',
            numero_horas_o_turnos_extras: '',
            valor_hora_prestacion: '',
            monto_maximo_contratacion: '',
            // Tercera parte
            cargo: '',
            correo: '',
            anexos: '',
            // cuarta parte
            // Debería llenarse sola, dependiendo del usuario logeado






        }
    }
  },
  methods: {
    submitForm() {

        this.$validator.validateAll().then(result => {
        if(result) {
          // if form have no errors
          alert("form submitted!");
        }else{
          // form have errors
        }
      });
    }
  },
  mounted() {
      
    console.log('fecha');
    console.log(this.form.fecha_solicitud);
    console.log( new Date().toISOString().slice(0,10) );
      
  }
}

</script>