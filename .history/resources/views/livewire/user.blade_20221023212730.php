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
                    @if (count($admins) == 0)
                        <tr>
                            <td colspan="5" class="text-center">No records found.</td>
                        </tr>
                        @else

                        @foreach ( $admins as $row )
                            
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
                        @endif
                </tbody>
            </table>
    </section>
</div>
