<div>
    <section>
        <div class="table-responsive ">
            <table class="table align-items-center table-flush text-white">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Creation Date</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    

                        @foreach ( $users as $row )
                            
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>
                                <a href="mailto:{{$row->email}}">{{$row->email}}</a>
                            </td>
                            <td>{{$row->created_at}}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-icon-only text-light" href="{{route('admin.view',$row->id)}}" role="button" >
                                    <i class="fas fa-eye"></i>
                                </a>
                                    
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
    </section>
</div>
