using UnityEngine;

namespace NDIGame
{

    public class Tower : MonoBehaviour
    {

        [SerializeField] private float attackSpeed;
        [SerializeField] private int damages;

        private Enemy focus;

        private float timer;

        private void Update()
        {
            if(focus && timer >= attackSpeed)
            {
                focus.Damage(damages);
                timer -= attackSpeed;
                return;
            }
            timer += Time.deltaTime;
        }

        public void FocusEnemy(Enemy enemy)
        {
            if(enemy)
            {
                return;
            }
            focus = enemy;
        }

    }

}