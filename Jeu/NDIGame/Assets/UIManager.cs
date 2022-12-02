using UnityEngine;
using TMPro;

namespace NDIGame
{

    public class UIManager : Singleton<UIManager>
    {

        [SerializeField] private Transform[] spots;
        [SerializeField] private Tower[] towerPrefabs;
        [SerializeField] private TMP_Text moneyText;

        [SerializeField] private Popup popupPrefab;

        private int selected = -1;

        private void Start()
        {
            moneyText.text = "" + GameManager.Instance.Money;
        }

        public void PlaceTower(int placement)
        {
            if(selected == -1)
            {
                return;
            }

            Debug.Log(placement + "/" + selected);
            Tower tower = Instantiate(towerPrefabs[selected], spots[placement].position, Quaternion.identity);
            if(!GameManager.Instance.CheckMoney(tower.Price))
            {
                Debug.Log("Returned as not enough money");
                ShowPopupText("Vous n'avez pas assez d'or !", 2f, 0.7f);
                Destroy(tower.gameObject);
                return;
            }
            GameManager.Instance.AddMoney(-tower.Price);
            selected = -1;
        }

        public void SelectTower(int tower)
        {
            selected = tower;
            Debug.Log("Tower selected: "+tower);
        }

        private void ShowPopupText(string text, float standStillTime, float fadeTime)
        {
            Popup popup = Instantiate(popupPrefab, Vector3.zero, Quaternion.identity);
            popup.Init(standStillTime + fadeTime, 200f, standStillTime);
            popup.Text = text;
        }

        public void UpdateMoney(int money)
        {
            moneyText.text = "" + money;
        }

    }

}