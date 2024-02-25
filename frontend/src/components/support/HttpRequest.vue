<script>
    export default class HttpRequest {
        
        async httpPost(path, formData){
            try {
                let response = await fetch(import.meta.env.VITE_BACKEND_DOMAIN + path, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8',
                    },
                    body: JSON.stringify(formData)
                })
                
                return await response.json()
                
            } catch (error) {
                console.error(error);
            }
        }
    }
</script>

