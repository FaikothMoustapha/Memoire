@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Administrateur</h6>
                            <h3>Bon retour</h3>
                        </div>
                        <div class="icon">
                            <i class="ik ik-award"></i>
                        </div>
                    </div>
                    
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                </div>
            </div>
        </div>
    
    </div>


    
    <div class="card">
        <div class="card-header row">
            <div class="col col-sm-3">
                <div class="card-options d-inline-block">
                    <div class="dropdown d-inline-block">
                        <h3>GESTION DES UTILISATEURS</h3>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="card-search with-adv-search dropdown">
                    <form action="">
                        <input type="text" class="form-control global_filter" id="global_filter" placeholder="Search.." required>
                        
                        <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col0_filter" placeholder="Name" data-column="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Position" data-column="1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Office" data-column="2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Age" data-column="3">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col4_filter" placeholder="Start date" data-column="4">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control column_filter" id="col5_filter" placeholder="Salary" data-column="5">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-theme">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <button class="btn btn-success">Ajouter</button>
            </div>
           
        </div>
        <div class="card-body">
            <table  class="table">
                <thead>
                    <tr>
                       
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>email</th>
                        
                        <th>Role</th>
                        <th>statut </th>
                        <th>Action</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td>MOUSTAPHA</td>
                        <td>Faïkoth</td>
                        <td>faikoth@gmail.com</td>
                        <td>Admin</td>
                        <td><span class="badge badge-success">Active</span></td>
                        
                        <td> 
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-space btn-primary">Action</button></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
                                    <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                    <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                    @method('DELETE')
                                    <a href=""><button type="submit" class="btn btn-space btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                          
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        
                        <td>SAGBO</td>
                        <td>Joseph</td>
                        <td>jo@gmail.com</td>
                        <td>Chef de projet</td>
                        <td><span class="badge badge-danger">Inactif</span></td>
                        
                        <td> 
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-space btn-primary">Action</button></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
                                    <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                    <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                    @method('DELETE')
                                    <a href=""><button type="submit" class="btn btn-space btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                          
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        
                        <td>MOUSSA</td>
                        <td>Abi</td>
                        <td>abi@gmail.com</td>
                        <td>Responsable de suivi</td>
                        <td><span class="badge badge-success">Active</span></td>
                        
                        <td> 
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-space btn-primary">Action</button></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
                                    <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                    <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                    @method('DELETE')
                                    <a href=""><button type="submit" class="btn btn-space btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                          
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        
                        <td>LALA</td>
                        <td>Kralael</td>
                        <td>kra@gmail.com</td>
                        <td>DSI</td>
                        <td><span class="badge badge-success">Active</span></td>
                        
                        <td> 
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-space btn-primary">Action</button></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
                                    <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                    <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                    @method('DELETE')
                                    <a href=""><button type="submit" class="btn btn-space btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                          
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        
                        <td>MODO</td>
                        <td>Laic</td>
                        <td>laic@gmail.com</td>
                        <td>Chef de projet</td>
                        <td><span class="badge badge-success">Active</span></td>
                        
                        <td> 
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-space btn-primary">Action</button></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
                                    <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                    <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                    @method('DELETE')
                                    <a href=""><button type="submit" class="btn btn-space btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                          
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        
                        <td>MISSE</td>
                        <td>Madi</td>
                        <td>madi@gmail.com</td>
                        <td>Chef de projet</td>
                        <td><span class="badge badge-danger">Inactif</span></td>
                        
                        <td> 
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-space btn-primary">Action</button></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
                                    <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                    <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                    @method('DELETE')
                                    <a href=""><button type="submit" class="btn btn-space btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                          
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection