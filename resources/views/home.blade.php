@extends('layouts.app')

@section('content')

<b-container fluid>
    <b-row>
        <b-col cols="4">
            <b-form class="my-3 mx-2">
                <b-form-input class="text-center"
                    type="text"
                    placeholder="Buscar contacto ...">
                </b-form-input>
            </b-form>

            <b-list-group>
                <b-list-group-item variant="dark">
                    <b-row class="p-2" align-h="center">
                        <b-col cols="12" md="3" class="text-center">
                            <b-img rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1" />
                        </b-col>
                        <b-col cols="6" align-self="center" class="d-none d-md-block">
                            <p class="mb-1">Josef Waelchi</p>
                            <p class="text-muted small mb-1">Tú: Hasta luego</p>
                        </b-col>
                        <b-col cols="3" class="d-none d-md-block">
                            <p class="text-muted small">1:37pm</p>
                        </b-col>
                    </b-row>
                </b-list-group-item>
                <b-list-group-item>
                    <b-row class="p-2" align-h="center">
                        <b-col cols="12" md="3" class="text-center">
                            <b-img rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1" />
                        </b-col>
                        <b-col cols="6" align-self="center" class="d-none d-md-block">
                            <p class="mb-1">Josef Waelchi</p>
                            <p class="text-muted small mb-1">Tú: Hasta luego</p>
                        </b-col>
                        <b-col cols="3" class="d-none d-md-block">
                            <p class="text-muted small">1:37pm</p>
                        </b-col>
                    </b-row>
                </b-list-group-item>
                <b-list-group-item variant="secondary">
                    <b-row class="p-2" align-h="center">
                        <b-col cols="12" md="3" class="text-center">
                            <b-img rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1" />
                        </b-col>
                        <b-col cols="6" align-self="center" class="d-none d-md-block">
                            <p class="mb-1">Josef Waelchi</p>
                            <p class="text-muted small mb-1">Tú: Hasta luego</p>
                        </b-col>
                        <b-col cols="3" class="d-none d-md-block">
                            <p class="text-muted small">1:37pm</p>
                        </b-col>
                    </b-row>
                </b-list-group-item>
            </b-list-group>            




        </b-col>
        <b-col cols="8">
            <b-row>
                <b-col cols="8"></b-col>
                <b-col cols="4">
                    <b-img rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1" />
                    <p>Usuario seleccionado</p>
                    <hr>
                    <b-form-checkbox>
                        Desactivar notificaciones
                    </b-form-checkbox>
                </b-col>
            </b-row>
        </b-col>
    </b-row>
</b-container>

@endsection
