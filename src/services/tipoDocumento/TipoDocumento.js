export default class TipoDocumento {
  constructor (obj = {}) {
    this.tipoDocumento = obj.tipoDocumento || ''
    this.status = obj.status || 1
    this.descricao = obj.descricao || ''
    this.codigo = obj.codigo || ''
    this.usuarioCriador = obj.usuarioCriador || ''
  }
}
